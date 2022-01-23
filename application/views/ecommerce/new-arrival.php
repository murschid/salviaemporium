<div class="product-double-row-area section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h2 class="section-title"><?= lang('new_arrivals');?></h2>
                    <!--<p class="section-subtitle">Our traditional dining tables, chairs, case pieces and other traditional dining furniture are geared toward those who appreciate the simplicity and true craftsmanship.</p>-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product-row-wrapper">
                    <div class="row">
                        <?php foreach ($products as $product):?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                            <div class="single-grid-product">
                                <?= form_open('cart/addtocart');?>
                                <div class="single-grid-product__image">
                                    <a href="<?= base_url('ecommerce/detail/'.$product->id); ?>.html" class="image-wrap">
                                        <?php $no = 0; foreach (explode(',',$product->images) as $key): $no++;?>
                                        <img src="<?= base_url('assets/images/products/'.$key);?>" class="prod360" alt="270x360">
                                        <?php if($no == 2) : break; endif; endforeach;?>
                                    </a>
                                    <div class="product-hover-icon-wrapper">
                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger" for="<?=$product->id;?>" href="#qv-1" ><i class="fa fa-eye"></i></a></span>
                                        <?php if($product->stock >= 1):?>
                                        <button type="submit" class="single-icon single-icon--add-to-cart"><a><i class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></button>
                                        <?php else:?>
					<button type="button" class="single-icon-oos single-icon-add-to-cart"><a class="nocursor"><i class="fa fa-shopping-basket"></i> <span>OUT OF STOCK</span></a></button>
					<?php endif;?>
					<span class="single-icon single-icon--compare"><a><i class="fa fa-exchange"></i></a></span>
                                    </div>
                                </div>
                                <input type="hidden" name="pro_id" value="<?=$product->id;?>">
                                <input type="hidden" name="quantity" value="1">
                                <div class="single-grid-product__content">
                                    <h3 class="title"><a href="<?= base_url('ecommerce/detail/'.$product->id); ?>.html"><?=$product->name;?></a></h3>
                                    <div class="price"><span class="main-price">৳<?=$product->price;?></span></div>
                                    <?php if($product->color != NULL):?>
                                    <div class="color">
                                        <?php foreach (explode(',',$product->color) as $key): ?>
                                        <label class="colorbtn btn bg-<?= strtolower($key);?>" data-tippy="<?=$key;?>">
                                            <input type="radio" class="prcolor_<?=$product->id;?>" name="color" value="<?=$key;?>" required="" checked="">
                                        </label>
                                        <?php endforeach;?>
                                    </div>
                                    <?php endif;?>
                                    <?php if($product->size != NULL):?>
                                    <div class="sizes">
                                        <select id="myformcntrl" name="size" class="form-control myformcntrl" required="">
                                            <?php foreach (explode(',',$product->size) as $key): ?>
                                            <option value="<?=$key;?>"><?=$key;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <?php endif;?>
                                    <a class="favorite-icon addtowishlist" onclick="addtowish('<?=$product->id;?>')"><i class="fa fa-heart-o"></i></a>
                                </div>
                                <?= form_close();?>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>