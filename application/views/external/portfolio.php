<section class="gallery-section-two">
    <div class="auto-container">
        <div class="project-title">
            <h2>We <span>love</span> what we do <br> We <span>passionate</span> to our work</h2>
        </div>
        <div class="mixitup-gallery">
            <div class="filters clearfix">
                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter="all">ALL WORKS</li>
                    <li class="filter" data-role="button" data-filter=".house">HOUSES</li>
                    <li class="filter" data-role="button" data-filter=".apartment">APARTMENTS</li>
                    <li class="filter" data-role="button" data-filter=".modeling">3D MODELING</li>
                    <li class="filter" data-role="button" data-filter=".architecture">ARCHITECTURE</li>
                    <li class="filter" data-role="button" data-filter=".design">INTERIOR DESIGN</li>
                </ul>
            </div>
            <div class="filter-list row clearfix">
                <?php foreach ($projects as $project):?>
                <div class="gallery-block-two mix all col-lg-4 col-md-4 col-sm-6 col-xs-12 <?=$project->category;?>">
                    <div class="inner-box">
                        <div class="image">
                            <a href="<?= base_url('project-detail/'.$project->id);?>.html"><img src="<?= base_url('assets/images/gallery/33.jpg'); ?>" alt="<?=$project->name;?>"/></a>
                            <div class="overlay-box">
                                <div class="content-box">
                                    <div class="content">
                                        <h3><a href="<?= base_url('project-detail/'.$project->id);?>.html"><?=$project->name;?></a></h3>
                                        <div class="designation"><?=$project->category;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <div class="gallery-block-two mix all apartment col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="#"><img src="<?= base_url('assets/images/gallery/34.jpg'); ?>" alt="" /></a>
                            <div class="overlay-box">
                                <div class="content-box">
                                    <div class="content">
                                        <h3><a href="#">Loyal House</a></h3>
                                        <div class="designation">design / interior</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-block-two mix all modeling design col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="#"><img src="<?= base_url('assets/images/gallery/35.jpg'); ?>" alt="" /></a>
                            <div class="overlay-box">
                                <div class="content-box">
                                    <div class="content">
                                        <h3><a href="#">Commercial Building</a></h3>
                                        <div class="designation">design / interior</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>