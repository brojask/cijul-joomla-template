<?php
defined('_JEXEC') or die;
$doc = JFactory::getDocument();
$app = JFactory::getApplication();

$doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/font-awesome.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/styles.css');
#$doc->addStyleSheet('templates/' . $this->template . '/css/nav.css');
$doc->addScript('templates/' . $this->template . '/js/jquery.js', 'text/javascript');
$doc->addScript('templates/' . $this->template . '/js/jquery.placeholder.js', 'text/javascript');
$doc->addScript('templates/' . $this->template . '/js/main.js', 'text/javascript');
$this->setGenerator(null);

$templateparams	= $app->getTemplate(true)->params;

$error = array(
	1=>'Debe digitar un usuario válido.',
	2=>'Debe digitar clave válida.',
	3=>'Usuario o clave incorrecta.',
	4=>'Su sesión ha expirado, vuelva a autenticarse.',
	5=>'Lo sentimos, cuenta bloqueada por incumplimiento del reglamento.',
	6=> 'Debe iniciar una sesión'
	);
?>
<!--
    Diseño y desarrollo por: Bryan Rojas Quesada. Febrero, 2014
-->
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <meta name="robots" content="index, follow">
        <link href="<?php echo 'templates/' . $this->template; ?>/img/favicon.png" rel="shortcut icon" type="image/x-icon" />        
        <!-- IMAGE FOR FACEBOOK -->
        <link rel="image_src" href="<?php echo 'templates/' . $this->template; ?>/img/cijul-thumbnail.png" />
        <jdoc:include type="head" />        
        <!--[if IE 7]>
            <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome-ie7.css">
        <![endif]-->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->        
</head>
<body>    

    <div class="container">
        <div class="row" id="header">
            <div class="col-6 col-sm-6" id="logo">
                <a href="<?= $this->baseurl ?>">
                    <img src="<?php echo 'templates/' . $this->template; ?>/img/logo.png" alt="Logo CIJUL" class="img-responsive">
                </a>
            </div>
            <div class="col-6 col-sm-6">
                <div class="pull-right" id="auth">
                    <jdoc:include type="modules" name="topmenu" />                   
                </div>
            </div>
        </div>
        <div class="row" id="nav-menu">
            <div class="masthead">
                <jdoc:include type="modules" name="menu" />
            </div>
            <!-- Navbar -->
        </div>        
        <?php if ($this->countModules('carousel')) : ?>
            <!-- Hero content-->
            <div class="row">
                <jdoc:include type="modules" name="carousel" />
            </div><!--/row-->
        <?php endif ?>
        <div class="row" id="center">        
            <?php if ($this->countModules('sidebar')) : ?>
                <div class="col-xs-12 col-sm-9">
                <?php else: ?>
                    <div class="col-xs-12 col-sm-12">
                    <?php endif ?>
                    <div id="main-content">
                        <jdoc:include type="modules" name="main" />
                        <jdoc:include type="message" />
                        <?php if (isset($_GET['e'])): ?>
                            <?php $tipo_error = base64_decode($_GET['e']) ?>
                            <div class="alert alert-info text-center">
                                <strong><?= $error[$tipo_error] ?></strong>
                            </div>
                        <?php endif ?>
                        <jdoc:include type="component" />                        
                    </div>                    
                </div><!--/span-->
                <?php if ($this->countModules('sidebar')) : ?>
                    <div class="col-xs-12 col-sm-3 well" id="sidebar">
                        <jdoc:include type="modules" name="sidebar" style="well" />
                    </div><!--/span-->
                <?php endif ?>
            </div><!--/row-->            

            <div class="row" id="footer">
                <footer>
                    <div class="text-center">
                        <jdoc:include type="modules" name="footer" />
                    </div>
                </footer>               
            </div>
        </div><!--/.container-->
</body>
</html>