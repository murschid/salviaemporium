<!--<section class="map-section">
    <div class="map-outer">
        <div class="map-canvas"
             data-zoom="15"
             data-lat="23.79033936594645"
             data-lng="90.40383642978065"
             data-type="roadmap"
             data-hue="#ffc400"
             data-title="Envato"
             data-icon-path="<?#= base_url('assets/images/icons/map-marker.png'); ?>"
             data-content="24/1, Nalbhog Main Road, Uttara-12<br><a href='mailto:info@sobujpatagroup.com'>info@sobujpatagroup.com</a>">
        </div>
    </div>
</section>-->
<section class="map-section container-fluid" style="margin-top:20px;">
    <div class="map-outer">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.411439825342!2d90.37641351546259!3d23.875024784528147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c40bcf246a25%3A0xb68765768cffd1d4!2sRupayan%20City%20Uttara!5e0!3m2!1sen!2sbd!4v1580352949687!5m2!1sen!2sbd" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</section>
<section class="contact-section" style="background-image:url(<?= base_url('assets/images/resource/pattern-7.png'); ?>)">
    <div class="auto-container">
        <div class="sec-title-two">
            <h2>Drop Us a Line</h2>
        </div>
        <div class="row clearfix">
            <div class="form-column col-md-7 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do mod tempor incididunt ut labore et dolore magna aliqua. </div>
                    <div class="contact-form">
                        <div class="required">Fields marked with an * are required.</div>
                        <!--Contact Form-->
                        <?php
                        $errors = $this->session->flashdata('errors');
                        $success = $this->session->flashdata('success');
                        ?>
                        <?php if (isset($errors)): ?>
                            <div class="alert alert-danger"><?php echo $errors; ?></div>
                        <?php endif; ?>
                        <?php if (isset($success)): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>
                        <?= form_open('home/contact_save'); ?>
                        <div class="form-group">
                            <input type="text" name="fname" minlength="3" maxlength="100" placeholder="Name*" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" minlength="9" maxlength="100" placeholder="Email*" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" minlength="11" maxlength="15" placeholder="Mobile*" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" minlength="3" maxlength="100" placeholder="Subject*" required="">
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Message*" minlength="10"  maxlength="1000" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <button class="theme-btn btn-style-two" type="submit" name="submit-form">Submit</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="info-column col-md-5 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <ul>
                        <li><span>Address :</span>24/1, Nalbhog Main Road (Rupayan City Gate), Uttara-12, Dhaka-1230</li>
                        <li><span>Phone :</span>+8801712-741844</li>
                        <li><span>Email :</span>info@sobujpatagroup.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>