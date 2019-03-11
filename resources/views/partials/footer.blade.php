<div style="padding-top: 10px; background: white; border-top: solid 2px #e4e6e9; border-radius: 0px; position: fixed;left: 0;bottom: 0;width: 100%;">
    <div class="container">
    <div class="row">
    <div class="col-md-6">
        <p><strong>Made With <i style="color: red;" class="fa fa-heart" aria-hidden="true"></i></strong></p>
    </div>
    <div class="col-md-6">
        <li class="dropdown dropup pull-right" style="list-style: none;">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-map-marker fa-lg"></i></a>
          <ul style="margin-bottom: 12px;" class="dropdown-menu">
            <li><a href="{{ str_replace('en','fr',url()->full()) }}">Frensh</a></li>
            <li><a href="{{ str_replace('fr','en',url()->full()) }}">English</a></li>
          </ul>
        </li>
    </div>
</div>
</div>
</div>


