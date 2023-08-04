@extends('layouts.app')
@section('content')
 <!-- content @s -->
 <div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><span>Team Status</span></div>
                    <h2 class="nk-block-title fw-normal">Referal Tree</h2>
                   
                </div>
            </div><!-- .nk-block-head -->
           
            <!-- NK-Block @s -->
            <div class="nk-block">
                
                
              <div id="treemain">
      
        
        @php $i=0 @endphp
        @if($loggedInUser->childNodes->count()>0)
        @php $p=$i; @endphp
           <div id="node_{{$i}}" class="window hidden"
             data-id="{{$i++}}"
             data-parent=""
             data-first-child="{{$i}}"
             data-next-sibling="">
            {{$loggedInUser->name}}
        </div>

           @foreach($loggedInUser->childNodes as $key=>$value)
            @php $q=$i; @endphp
           <div id="node_{{$i}}" class="window hidden"
             data-id="{{$i++}}"
             data-parent="{{$p}}"
             data-first-child="{{$value->childNodes->count()>0?$i:''}}"
             data-next-sibling="{{isset($loggedInUser->childNodes[$key+1])?$value->childNodes->count()+$i:''}}">
            {{$value->name}}
        </div>
        @foreach($value->childNodes as $kky=>$vv)
           <div id="node_{{$i}}" class="window hidden"
             data-id="{{$i++}}"
             data-parent="{{$q}}"
             data-first-child=""
             data-next-sibling="{{isset($value->childNodes[$kky+1])?$i:''}}">
            {{$vv->name}}
        </div>
           @endforeach
           @endforeach
         
        @endif
        

    </div>
            </div>
            <!-- NK-Block @e -->
            <!-- //  Content End -->
        </div>
    </div>
</div>
<!-- content @e -->
 

@endsection
@section('footerScript')
@parent
 <style type="text/css">
        body { background-color: #f7f7f7; font-family: 'Roboto'; }
.container { margin: 150px auto; max-width: 960px; }
        .window {
            font-weight: bold;
            cursor: pointer;
            border:1px solid #346789;
            box-shadow: 2px 2px 10px #aaa;
            -o-box-shadow: 2px 2px 10px #aaa;
            -webkit-box-shadow: 2px 2px 10px #aaa;
            -moz-box-shadow: 2px 2px 10px #aaa;
            -moz-border-radius:0.5em;
            border-radius:0.5em;
            /*
            opacity:0.8;
            filter:alpha(opacity=80);
            */
            width: 10em; height: auto;
            padding: 0.5em 0em;
            text-align:center;
            z-index:20; position:absolute;
            background-color:#eeeeef;
            color:black;
            font-family:helvetica;
            font-size:0.9em;
            word-wrap:break-word;
        }

        .window:hover {
            box-shadow: 2px 2px 10px #444;
            -o-box-shadow: 2px 2px 10px #444;
            -webkit-box-shadow: 2px 2px 10px #444;
            -moz-box-shadow: 2px 2px 10px #444;
            /*
            opacity:0.6;
            filter:alpha(opacity=60);
            */
        }

        /*
        .window > div {
            margin-top: 19%;
            margin-bottom: 19%;
        }
        */

        .hidden {
            display: none;
        }

        .collapser {
            cursor: pointer;
            border:1px dotted gray;
            z-index:21;
        }

        .errorWindow {
            border: 2px solid red;
        }

        #treemain {
            height: 500px;
            width: 100%;
            position: relative;
            overflow: auto;
        }

    </style>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsPlumb/1.7.10/jsPlumb.min.js"  crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('assets/js/jsplumb-tree.js')}}"></script>

    <script type="text/javascript">
        // -- init -- //
        jsPlumb.ready(function() {

            // connection lines style
            var connectorPaintStyle = {
                lineWidth:3,
                strokeStyle:"#4F81BE",
                joinstyle:"round"
            };

            var pdef = {
                // disable dragging
                DragOptions: null,
                // the tree container
                Container : "treemain"
            };
            var plumb = jsPlumb.getInstance(pdef);

            // all sizes are in pixels
            var opts = {
                prefix: 'node_',
                // left margin of the root node
                baseLeft: 24,
                // top margin of the root node
                baseTop: 24,
                // node width
                nodeWidth: 100,
                // horizontal margin between nodes
                hSpace: 36,
                // vertical margin between nodes
                vSpace: 10,
                imgPlus: '{{asset("assets/images/tree_expand.png")}}',
                imgMinus: '{{asset("assets/images/tree_collapse.png")}}',
                // queste non sono tutte in pixel
                sourceAnchor: [ 1, 0.5, 1, 0, 10, 0 ],
                targetAnchor: "LeftMiddle",
                sourceEndpoint: {
                    endpoint:["Image", {url: "{{asset('assets/images/tree_collapse.png')}}"}],
                    cssClass:"collapser",
                    isSource:true,
                    connector:[ "Flowchart", { stub:[40, 60], gap:[10, 0], cornerRadius:5, alwaysRespectStubs:false } ],
                    connectorStyle:connectorPaintStyle,
                    enabled: false,
                    maxConnections:-1,
                    dragOptions:null
                },
                targetEndpoint: {
                    endpoint:"Blank",
                    maxConnections:-1,
                    dropOptions:null,
                    enabled: false,
                    isTarget:true
                },
                connectFunc: function(tree, node) {
                    var cid = node.data('id');
                    console.log('Connecting node ' + cid);
                }
            };
            var tree = jQuery.jsPlumbTree(plumb, opts);
            tree.init();
            window.treemain = tree;
        });

        function positioningBlockBug() {
            var oldNode = window.treemain.nodeById(2);
            //var newNode = $('#node_2_new');
            var newNode = $('    <div id="node_2" class="window hidden"\n' +
                '         data-id="2"\n' +
                '         data-parent="0"\n' +
                '         data-first-child="6"\n' +
                '         data-next-sibling="3">\n' +
                '        Node 2 NEW\n' +
                '    </div>\n');
            if (oldNode) {
                // butta il nodo nel container
                oldNode.replaceWith(newNode);
                // rimostra il nodo
                newNode.id = 'node_2';
                newNode.show();
                // aggiorna l'albero
                window.treemain.update();
            }

        }

    </script>  
 @endsection