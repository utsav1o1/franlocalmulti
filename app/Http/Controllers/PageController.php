<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;
use App\Repositories\AgentRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param PageRepository $pages
     * @param AgentRepository $agents
     * @return void
     */
    public function __construct(
        PageRepository $pages,
        AgentRepository $agents
    ){
        $this->pages = $pages;
        $this->agents = $agents;
    }

    /**
     * Show the page detail page.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutus()
    {
        return view('aboutus')
        ->withCoreMembers($this->agents->where('is_active', '=','1')->where('is_core_member', '1')->orderby('order_position', 'asc')->get());
    }

    /**
     * Show the page detail page.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = $this->pages->findByField('slug', $slug);
        if($page){
            return view('page-detail')
                ->withPage($page);
        }
        return view('404');
    }

    public function showBlog($slug)
    {
        $blog = \App\Models\Corporate\Blog::where('slug', $slug)->first();

        return view('frontend.blog-details', [
            'blog' => $blog
        ]);
    }
}
