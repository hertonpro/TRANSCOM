<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">fiche d'identification</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                        <form role="form">
                            <div class="form-group">Numero plaque 
                              <input class="form-control" placeholder="Enter text">
                                <p class="help-block">Example BKV-45334-AA</p>
                          </div>
                            <div class="form-group">Marque 
                              <input class="form-control" placeholder="Enter text">
                                    <p class="help-block">Example TOYOTA.</p>
                            </div>
                            <div class="form-group">
                                    <label>Model</label>
                                    <input class="form-control" placeholder="Enter text">
                            </div>
                            <label>Type du moyen de transport</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked> gauche
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">droite
                                </label>
                            <div class="form-group">
                                <label>Date de fabrication</label>
                                <input type="date" class="form-control" placeholder="Enter text">
                            </div>
                            <div class="form-group">ID chassis
                              <input class="form-control" placeholder="Enter text">
                            </div>
							<div class="form-group">ID moteur
                              <input class="form-control" placeholder="Enter text">
                            </div>
							<div class="form-group">Couleur
                              <input class="form-control" placeholder="Enter text">
                            </div>
                            <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" placeholder="Enter text">
                            </div>
                            <div class="form-group">
                                <label>Inline Radio Buttons</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked> gauche
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">droite
                                </label>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-primary btn-positio-left" href="main.php?p=saisie_proprietaire" >suivant</a>
                            </div>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </form>
            </div>
        </div>
    </div> 
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Images de l'automobile 
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <h5 class="header">visualiser image</h5>
                <div class="row">

            <div class="col-lg-12">
            
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://onelive.us/wp-content/uploads/2014/08/flower-delivery-online.jpg" data-target="#image-gallery">
                        <img class="img-responsive" src="../images/rav4.png" alt="Short alt text">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="The car i dream about" data-caption="If you sponsor me, I can drive this car" data-image="http://www.picturesnew.com/media/images/car-image.jpg" data-target="#image-gallery">
                        <img class="img-responsive" src="../images/rav4.png" alt="A alt text">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice" data-caption="And if there is money left, my girlfriend will receive this car" data-image="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" data-target="#image-gallery">
                        <img class="img-responsive" src="../images/rav4.png" alt="Another alt text">
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice" data-caption="And if there is money left, my girlfriend will receive this car" data-image="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" data-target="#image-gallery">
                        <img class="img-responsive" src="../images/rav4.png" alt="Another alt text">
                    </a>
                </div>
            </div>


            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive" src="../images/rav4.png">
                        </div>
                        <div class="modal-footer">

                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                            </div>

                            <div class="col-md-8 text-justify" id="image-gallery-caption">
                                <P>comentaires</P>
                            </div>

                            <div class="col-md-2">
                                <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>                