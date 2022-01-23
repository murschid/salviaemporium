<section class="style-two mymargin">
    <div class="auto-container">
        <div class="sec-title clearfix">
            <div class="pull-left">
                <div class="title">Latest Works</div>
                <h3>Our Projects</h3>
            </div>
            <!--<div class="pull-right">
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns">
                        <li class="active filter" data-role="button" data-filter="all">All Works</li>
                        <li class="filter" data-role="button" data-filter=".apartment">Apartments</li>
                        <li class="filter" data-role="button" data-filter=".architecture">Architecture</li>
                        <li class="filter" data-role="button" data-filter=".design">Interior Design</li>
                    </ul>
                </div>
            </div>-->
        </div>
    </div>
    <div class="row clearfix">
        <?php foreach ($projects as $project):?>
        <div class="gallery-item col-md-3 col-sm-6 col-xs-12 <?=$project->category;?>">
            <div class="inner-box">
                <figure class="image-box">
                    <img src="<?= base_url('assets/images/gallery/15.jpg'); ?>" alt="">
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <a href="<?= base_url('project-detail/'.$project->id);?>.html" class="link"><span class="icon fa fa-link"></span></a>
                                <!--<a href="<?#= base_url('assets/images/gallery/15.jpg'); ?>" data-fancybox="images" data-caption="" class="link"><span class="icon fa fa-search"></span></a>-->
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</section>