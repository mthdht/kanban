@extends('layouts.kanban.app')

@section('content')

    <div class="topBoard w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        <div class="w3-quarter">
            <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-folder w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>52</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Projets</h4>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>52</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Tickets</h4>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-cogs w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>52</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>options</h4>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>52</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Messages</h4>
            </div>
        </div>
    </div>

    <div class="recent w3-margin-top w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-folder"></i> Projets récents</b></h5>
        </header>

        <div class="w3-quarter">
            <div class="w3-container w3-padding-16 w3-center w3-round w3-card w3-hover-text-teal">
                <h3 class="w3-margin-bottom"><b>projet 1</b></h3>
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                <div class="w3-right">
                    <h3>6</h3>
                    <p> Tickets</p>
                </div>
                <div class="w3-clear"></div>
                <div class="tag"><i class="fa fa-tags"></i> js-php</div>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-padding-16 w3-center w3-round w3-card w3-hover-text-teal">
                <h3 class="w3-margin-bottom"><b>projet 1</b></h3>
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                <div class="w3-right">
                    <h3>6</h3>
                    <p> Tickets</p>
                </div>
                <div class="w3-clear"></div>
                <div class="tag"><i class="fa fa-tags"></i> js-php</div>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-padding-16 w3-center w3-round w3-card w3-hover-text-teal">
                <h3 class="w3-margin-bottom"><b>projet 1</b></h3>
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                <div class="w3-right">
                    <h3>6</h3>
                    <p> Tickets</p>
                </div>
                <div class="w3-clear"></div>
                <div class="tag"><i class="fa fa-tags"></i> js-php</div>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-padding-16 w3-center w3-round w3-card w3-hover-text-teal">
                <h3 class="w3-margin-bottom"><b>projet 1</b></h3>
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                <div class="w3-right">
                    <h3>6</h3>
                    <p> Tickets</p>
                </div>
                <div class="w3-clear"></div>
                <div class="tag"><i class="fa fa-tags"></i> js-php</div>
            </div>
        </div>


    </div>

    <div class="stat w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-area-chart"></i> Statistics</b></h5>
        </header>
    </div>
@endsection
