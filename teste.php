<!DOCTYPE html>
<?php
require_once 'lib/Cliente.php';
$c = new Clientes();
$cl = array();
$clientes = $c->clientesJSON();
foreach ($c->listarClienteSV() as $key => $value) {
  $cl[] = $value;
}
$jsonclientes = json_encode($cl);
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Autocomplete</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <input type="hidden" name="cli" id="cli" value='<?php echo $jsonclientes ?>'>
    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">

    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Autocomplete</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Autocomplete</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Autocomplete - Bootstrap Typehead</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <strong>Autocomplete - typehead</strong><br/>
                            The Typeahead plugin from Twitter's Bootstrap 2 ready to use with Bootstrap 3 and Bootstrap 4. Full documentation can be found: <a href="https://github.com/bassjobsen/Bootstrap-3-Typeahead" target="_blank">https://github.com/bassjobsen/Bootstrap-3-Typeahead</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Basic example - data-*</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                Basic example via data attributes: <span class="text-muted">(type 'item...')</span>
                            </p>
                            <input type="text" placeholder="item..." data-provide="typeahead" data-source=
                            '<?php echo $clientes;?>' class="form-control" />
                            <pre class="m-t-sm">
&lt;input type="text"
data-provide="typeahead"
data-source='["item 1","item 2","item 3"]'
placeholder="item..."
class="form-control" /&gt;</pre>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Loading collection</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                Esse aq eh o do json <span class="text-muted">(type 'Arg...')</span>
                            </p>
                            <input type="text" placeholder="item..." class="typeahead_2 form-control" />
                            <pre class="m-t-sm">
$.get('js/api/typehead_collection.json', function(data){
    $(".typeahead_2").typeahead({ source:data.countries });
},'json'); </pre>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Basic example - javascript</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                Basic example via javascript <span class="text-muted">(type 'item...')</span>
                            </p>
                            <input type="text" placeholder="item..." id="asd" class="typeahead_1 form-control" />
                            <pre class="m-t-sm">
$('.typeahead_1').typeahead({
    source: ["item 1","item 2","item 3"]
}); </pre>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Loading more complex object</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                Load json object - required 'name' attribute <span class="text-muted">(type 'Afg...')</span>
                            </p>
                            <input type="text" placeholder="item..." id="autocomplete" class="typeahead_3 form-control" />
                            <input type="hidden" name="cliente" id="cliente" value="">
                            <pre class="m-t-sm">
$('.typeahead_3').typeahead({
    source: [
        {"name": "Afghanistan", "code": "AF", "ccn0": "040"},
        {"name": "Land Islands", "code": "AX", "ccn0": "050"},
        {"name": "Albania", "code": "AL","ccn0": "060"},
        {"name": "Algeria", "code": "DZ","ccn0": "070"}
    ]
}); </pre>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Typehead -->
    <script src="js/plugins/typehead/bootstrap3-typeahead.min.js"></script>


    <script>

    var c = [];
    var cli = null;
    var obj = null;

/*
    $.post("actions/ClienteSV.php",
    function(data){

      cli = data;
      obj = JSON.parse(data);
      cli = JSON.stringify(obj);
      alert(cli);
      for (var cliente in obj) {
        var nme = (obj[cliente].name).concat(" ");
        var id = (obj[cliente].id).concat(" ");
        c.push({name: nme, id:id});

      }
    });

    function getCookie(name) {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i in cookies.length) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length -(-1)) == (name.concat('='))) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length-(-1)));

                    break;
                }
            }
        }
        return cookieValue;
    }
    var csrftoken = getCookie('csrftoken');

    function csrfSafeMethod(method) {
        // these HTTP methods do not require CSRF protection
        return (/^(GET|HEAD|OPTIONS|TRACE)$/.test(method));
    }

    $.ajaxSetup({
        beforeSend: function(xhr, settings) {
            if (!csrfSafeMethod(settings.type) && !this.crossDomain) {
                xhr.setRequestHeader("X-CSRFToken", csrftoken);
            }
        }
    });
    $.ajax({
        url: "http://znradiadores.com/actions/ClienteSV.php",
        type: "POST",
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: function (result) {
            cli = result;
            alert(cli);
        },
        error: function (result) {
            alert("error");
        }
    });*/

        var jsoncl = document.getElementById('cli').value;

        var obj = JSON.parse(jsoncl);
      for (var cliente in obj) {
        var nme = (obj[cliente].name).concat(" ");
        var id = (obj[cliente].cli_id).concat(" ");
        var carro = (obj[cliente].carro).concat(" ");
        var des = nme.concat(carro);
        c.push({name: des, id:id});
      }
        $(document).ready(function(){

            $('.typeahead_3').typeahead({
              source: c,
              updater: function(item) {
                  return item;
              }
            });

      });
    </script>

</body>

</html>
