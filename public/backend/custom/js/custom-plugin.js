/* select 2 */

$.fn.iniRemoteSelect2 = function(options) {
    options = options || {};

    options.theme = options.theme || 'classic';

    options.pageLimit = (options.pageLimit && options.pageLimit > 10) ? options.pageLimit : 50;

    var languageConfig = $.fn.select2.defaults.defaults.language;

    options.noResultsMsg = options.noResultsMsg || 'No results found';

    switch (typeof options.noResultsMsg) {
        case 'function':
            languageConfig.noResults = options.noResultsMsg;
            break;

        case 'string':
            {
                languageConfig.noResults = function() {
                    return options.noResultsMsg;
                };
            }
            break;
    }

    $.fn.select2.defaults.set("language", languageConfig);

    options.ajax = {
        url: options.url,
        dataType: 'json',
        delay: 50,
        data: function(params) {
            var data = {
                q: params.term || '',
                pageLimit: options.pageLimit,
                page: params.page || 1
            };

            if (options.extraData)
                data = $.extend(data, options.extraData);

            return data;
        },
        processResults: function(data, params) {


            if (data['status']) {

                switch (data['status']) {

                    case 'success':
                        {
                            if (options.onSuccess && typeof options.onSuccess == 'function')
                                options.onSuccess(data, textStatus, jqXHR);
                        }
                        break;

                    case 'session-error':
                        $.customNotify(data.message);
                        break;

                    case 'fail':
                    case 'error':
                        $.customNotify(data['message'], 'error');
                        break;
                }
            }

            if(data['redirect']) {
                setTimeout(function() {
                    window.location = data['redirect'];
                }, 1000);
            }

            params.page = params.page || 1;

            return {
                results: data.items,
                pagination: {
                    more: (params.page * options.pageLimit) < data.total_count
                }
            };
        },
        cache: false
    };

    this.select2(options);
    
    return this;
};

$.fn.applyImagePreview = function() {
    var previewEle = $('#' + this.attr('preview-element-id'));

    this.on('change', function () {

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                previewEle.attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
};