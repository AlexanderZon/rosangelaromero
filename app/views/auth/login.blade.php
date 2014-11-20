@extends('auth.layout')

@section('content')

  
    <!-- Login Screen -->
    <div class="login-wrapper">
    <div align="CENTER" class="login">
    <a href="/auth/login" title="Cprov"><img src="/images/logo_system.png"style = "padding-top:50px"/></a>


    </div>
      <div class="login-container" style="height:150px; color:#fff !important">
        	@if(isset($error))
				<div style="color:#FFF;">
					Error: {{ $error }}
				</div>
        	@endif
        <style type="text/css">
          *::-webkit-input-placeholder { /* WebKit browsers */
              color:    #fff;
          }
          *:-moz-plaolder { /* Mozilla Firefox 4 to 18 */
             color:    #fff;
             opacity:  1;
          }
          *::-moz-placeholder { /* Mozilla Firefox 19+ */
             color:    #fff;
             opacity:  1;
          }
          *:-ms-input-placeholder { /* Internet Explorer 10+ */
             color:    #fff;
          }
     

        </style>

        <form id="login-form" action="" method="post">
          <div class="form-group">
            <input class="form-control" placeholder="Usuario" type="text" name="username" style="color:#fff!important">
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Contraseña" type="password" name="password" style="color:#fff!important"><input type="submit" value="&#xf054;" style="color:#fff!important">
          </div>
        </form>
      </div>
    </div>
    <!-- End Login Screen -->

@stop