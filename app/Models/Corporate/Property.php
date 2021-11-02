<?php

namespace App\Models\Corporate;

use App\Models\Corporate\Agent;
use App\Models\Corporate\PriceType;
use App\Models\Corporate\PropertyAgent;
use App\Models\Corporate\PropertyCategory;
use App\Models\Corporate\PropertyImage;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use Sluggable;

    protected $table = 'properties';
    protected $connection = 'mysql-main';

    private $defaultPropertyCategories = null;

    public function __construct()
    {
        parent::__construct();

        $this->defaultPropertyCategories = PropertyCategory::getDefaultPropertyCategories();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public static function getDefaultCoverImageSize()
    {
        return [
            'width' => 400,
            'height' => 258,
        ];
    }

    public function isLeased()
    {
        if ($this->is_leased_sold == 'Y' && ($this->property_category_id == $this->defaultPropertyCategories['rent'])) {
            return true;
        }

        return false;
    }

    public function isSold()
    {
        if ($this->is_leased_sold == 'Y' && ($this->property_category_id == $this->defaultPropertyCategories['buy'])) {
            return true;
        }

        return false;
    }

    public function getOwnPropertyImagesDir()
    {
        return static::getPropertyImageDir() . $this->id;
    }

    public static function getPropertyImageDir()
    {
        return env('CORPORATE_URL') . '/uploads/properties/';
    }

    public function isCoverImageProvided()
    {
        return !is_null($this->main_image);
    }

    public function getDefaultPropertyImagePath()
    {
        return config('app.corporate_url') . '/uploads/default/default-property-image.jpg';
    }

    public function getCoverImage()
    {
        if ($this->isCoverImageProvided()) {
            return $this->getOwnPropertyImagesDir() . '/thumbnail-' . $this->main_image;
        }

        return $this->getDefaultPropertyImagePath();
    }

    public function getFormattedPrice()
    {
        $defaultPriceTypes = PriceType::getDefaultPriceTypes();

        switch ($this->price_type_id) {
            case 4:
            case 5:
                {
                    return '';
                }
                break;

            case 1:
            case 2:
                {
                    switch ($this->property_category_id) {
                        case $this->defaultPropertyCategories['rent']:
                            {
                                return '$' . number_format($this->price_from) . '/W';
                            }
                            break;

                        case $this->defaultPropertyCategories['buy']:
                            {
                                return '$' . number_format($this->price_from);
                            }
                            break;
                    }
                }
                break;

            case 3:
                {
                    switch ($this->property_category_id) {
                        case $this->defaultPropertyCategories['rent']:
                            {
                                return '$' . number_format($this->price_from) . '/W - $' . number_format($this->price_to) . '/W';
                            }
                            break;

                        case $this->defaultPropertyCategories['buy']:
                            {
                                return '$' . number_format($this->price_from) . ' - $' . number_format($this->price_to);
                            }
                            break;
                    }
                }
                break;
        }
    }

    public static function getBedroomOptions()
    {
        return [
            'any' => 'Any',
            0 => '0',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4+',
        ];
    }

    public static function getBathroomOptions()
    {
        return [
            'any' => 'Any',
            0 => '0',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4+',
        ];
    }

    public static function getGarageOptions()
    {
        return [
            'any' => 'Any',
            0 => '0',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4+',
        ];
    }

    public function getNumberOfBathroomsAttribute($value)
    {
        return (is_null($value) ? 0 : $value);
    }

    public function getNumberOfBedroomsAttribute($value)
    {
        return (is_null($value) ? 0 : $value);
    }

    public function getNumberOfGaragesAttribute($value)
    {
        return (is_null($value) ? 0 : $value);
    }

    public function getAgentIds()
    {
        $agentIds = [];

        $propertyAgents = $this->getPropertyAgentIds();

        if ($propertyAgents->count() > 0) {
            foreach ($propertyAgents as $agent) {
                $agentIds[] = $agent->agent_id;
            }

        }

        return $agentIds;
    }

    public function incrementViewCount()
    {
        $this->view_count++;
        $this->save();
    }

    public function getPropertyAgentIds()
    {
        return PropertyAgent::where('property_id', $this->id)
            ->get();
    }

    public function getPropertyAgents()
    {
        $agentIds = $this->getAgentIds();

        return Agent::whereIn('id', $agentIds)
            ->get();
    }

    public function getImages()
    {
        return PropertyImage::leftJoin('properties', 'properties.id', '=', 'property_images.property_id')
            ->select('property_images.*', DB::raw("(CASE WHEN properties.main_image = property_images.id THEN 'Y' ELSE 'N' END) AS is_cover_image"))
            ->where('property_images.property_id', $this->id)
            ->get();
    }
}
