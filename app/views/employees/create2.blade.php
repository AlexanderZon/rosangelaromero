@extends('layouts.index')

@section('content')
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <div class="page-title">
          <h1>
            Creación de formulario Empresa
          </h1>
        </div>
        <!-- DataTables Example -->
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading">
                <a href="{{ $route }}"><i class="icon-user"></i>Ir Atrás</a>
              </div>
              <div class="widget-content">
                <div class="wizard" id="wizard">
                  <div class="padded">
                    <ul class="wizard-nav nav nav-pills">
                      <li class="active">
                        <a data-toggle="tab" href="#tab1">1</a>
                      </li>
                      <li class="">
                        <a data-toggle="tab" href="#tab2">2 </a>
                      </li>
                      <li class="">
                        <a data-toggle="tab" href="#tab3">3</a>
                      </li>
                    </ul>
                    <div class="progress progress-striped active">
                      <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress-bar" role="progressbar" style="width: 33.3333333333333%;"></div>
                    </div>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <h2>
                          Login Credentials
                        </h2>
                        <form role="form">
                          <div class="form-group">
                            <label for="email">Email address</label><input class="form-control has-error" id="name" placeholder="john@email.com" type="email">
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label><input class="form-control" id="password" placeholder="4-8 characters" type="password">
                          </div>
                        </form>
                      </div>
                      <div class="tab-pane" id="tab2">
                        <h2>
                          Personal Information
                        </h2>
                        <form role="form">
                          <div class="form-group">
                            <label for="name">Full Name</label><input class="form-control" id="name" placeholder="" type="text">
                          </div>
                          <div class="form-group">
                            <label for="country">Country</label><input class="form-control" id="country" placeholder="" type="text">
                          </div>
                        </form>
                      </div>
                      <div class="tab-pane" id="tab3">
                        <h2>
                          Payment Information
                        </h2>
                        <form role="form">
                          <div class="form-group">
                            <label for="name-credit">Name on credit card</label><input class="form-control" id="name-credit" placeholder="" type="text">
                          </div>
                          <div class="form-group">
                            <label for="credit-card">Credit card number</label><input class="form-control" id="credit-card" placeholder="" type="text">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="pager">
                    <div class="btn btn-default-outline btn-previous disabled">
                      <i class="fa fa-long-arrow-left"></i>Back
                    </div>
                    <div class="btn btn-primary-outline btn-next">
                      Continue<i class="fa fa-long-arrow-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div>

        <script type="text/javascript">

        $(document).on('ready', function(){
        	$('#id_tipo_employee').change(function(e){
        		var elem = $(this);
        		console.log("Cambio a: " + elem.val());
        		var data = {
        			'id' : elem.val(),
        		};
        		$.post('/ajax/codigoemployees', data, function(data){
        			$('#id_codigo').val(data);
        			console.log(data);
        		});
        	})
        });

        </script>
        <!-- end DataTables Example -->
        @stop