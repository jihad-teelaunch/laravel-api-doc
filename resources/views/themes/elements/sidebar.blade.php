<div id="sidebar"
     class="sl-flex sl-overflow-y-auto sl-flex-col sl-sticky sl-inset-y-0 sl-pt-8 sl-bg-canvas-100 sl-border-r"
     style="width: calc((100% - 1800px) / 2 + 300px); padding-left: calc((100% - 1800px) / 2); min-width: 300px; max-height: 100vh">
    <div class="sl-flex sl-items-center sl-mb-5 sl-ml-4">
        @if($metadata['logo'] != false)
            <div class="sl-inline sl-overflow-x-hidden sl-overflow-y-hidden sl-mr-3 sl-rounded-lg"
                 style="background-color: transparent;">
                <img src="{{ $metadata['logo'] }}" height="30px" width="30px" alt="logo">
            </div>
        @endif
        <h4 class="sl-text-paragraph sl-leading-snug sl-font-prose sl-font-semibold sl-text-heading">
            {{ $metadata['title'] }}
        </h4>
    </div>

    <div class="sl-flex sl-overflow-y-auto sl-flex-col sl-flex-grow sl-flex-shrink"
         style="background-color: transparent">
        <div class="sl-overflow-y-auto sl-w-full sl-bg-canvas-100" style="background-color: transparent">
            <div class="sl-my-3" style="background-color: transparent">
                @foreach($headings as $h1)
                    <div class="expandable" style="background-color: transparent">
                        <div title="{!! $h1['name'] !!}" id="toc-item-{!! $h1['slug'] !!}"
                             style="background-color: transparent"
                             class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-4 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none">
                            <a href="#{!! $h1['slug'] !!}"
                               class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5 sl-p-0">{!! $h1['name'] !!}</a>
                            @if(count($h1['subheadings']) > 0)
                                <div class="sl-flex sl-items-center sl-text-xs expansion-chevrons"
                                     style="background-color: transparent">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                         data-icon="chevron-right"
                                         class="svg-inline--fa fa-chevron-right fa-fw sl-icon sl-text-muted"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path fill="currentColor"
                                              d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        @if(count($h1['subheadings']) > 0)
                            <div class="children" style="display: none;">
                                @foreach($h1['subheadings'] as $h2)
                                    <div class="expandable">
                                        <div
                                                onclick="window.location.href='#{!! $h2['slug'] !!}'"
                                                style="background-color: transparent"
                                                class="sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-8 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none"
                                                id="toc-item-{!! $h2['slug'] !!}">
                                            <div class="sl-flex-1 sl-items-center sl-truncate sl-mr-1.5 sl-p-0"
                                                 style="display: flex"
                                                 title="{!! $h2['name'] !!}">
                                                @if(isset($h2['method']))
                                                    <div
                                                            class="sl-font-prose sl-font-semibold sl-px-1.5 sl-py-0.5 sl-text-on-primary sl-rounded-lg sl-mr-2"
                                                            style="background-color: {{\Knuckles\Scribe\Tools\WritingUtils::$httpMethodToCssColour[$h2['method']]}}; font-size: 10px">
                                                        {{$h2['method']}}
                                                    </div>
                                                @endif
                                                <div class="ElementsTableOfContentsItem sl-block sl-no-underline"
                                                     style="background-color: transparent">
                                                    {!! $h2['name'] !!}
                                                </div>
                                            </div>
                                            @if(count($h2['subheadings']) > 0)
                                                <div class="sl-flex sl-items-center sl-text-xs expansion-chevrons">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                         data-icon="chevron-right"
                                                         class="svg-inline--fa fa-chevron-right fa-fw sl-icon sl-text-muted"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                                        <path fill="currentColor"
                                                              d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        @if(count($h2['subheadings']) > 0)
                                            <div class="children" style="display: none;">
                                                @foreach($h2['subheadings'] as $h3)
                                                    <div style="display: flex;background-color: transparent"
                                                         class="ElementsTableOfContentsItem sl-flex sl-items-center sl-h-md sl-pr-4 sl-pl-12 sl-bg-canvas-100 hover:sl-bg-canvas-200 sl-cursor-pointer sl-select-none"
                                                         onclick="window.location.href='#{!! $h3['slug'] !!}'">
                                                        @if(isset($h3['method']))
                                                            <div title="{!! $h3['name'] !!}"
                                                                 class="sl-font-prose sl-font-semibold sl-px-1.5 sl-py-0.5 sl-text-on-primary sl-rounded-lg sl-mr-2"
                                                                 style="background-color: {{\Knuckles\Scribe\Tools\WritingUtils::$httpMethodToCssColour[$h3['method']]}}; font-size: 10px"
                                                                 id="toc-item-{!! $h3['slug'] !!}">{!! $h3['method'] !!}
                                                            </div>
                                                        @endif
                                                        <div title="{!! $h3['name'] !!}"
                                                             id="toc-item-{!! $h3['slug'] !!}"
                                                             class="sl-flex sl-items-center">
                                                            {!! $h3['name'] !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
        <div class="sl-flex sl-items-center sl-px-4 sl-py-3 sl-border-t">
            <img height="25" width="25" src="./images/postman.svg" alt="postman">
            @if($metadata['postman_collection_url'])
                <a title="Download Postman collection" class="sl-mx-1"
                   href="{!! $metadata['postman_collection_url'] !!}" target="_blank">
                    <small>Postman collection</small>
                </a>
            @endif
        </div>
        <div class="sl-flex sl-items-center sl-px-4 sl-py-3 sl-border-t">
            {{ $metadata['last_updated'] }}
        </div>
    </div>
</div>
