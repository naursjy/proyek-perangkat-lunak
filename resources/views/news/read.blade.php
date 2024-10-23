@extends('layout.main')
@section('content')

<style>
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $pagetitle }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $pagetitle }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('news.read' , ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $pagetitle }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="">
                                <div class="card-body">
                                    <div class="form-container">
                                        @if($data->image)
                                        <img src="{{ asset('storage/photo-news/'.$data->image) }}" alt="preview-image" width="100px" height="120px" id="preview-image" class="img-thumbnail" style="justify-content: center;">
                                        @endif
                                        <!-- <div class="form-group mb-3">
                                            <div class="form-group-prepend">
                                                <label for="image">Gambar Berita</label>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Judul</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ $data->title }}" readonly>
                                        @error('title')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group" readonly>
                                        <label for="exampleInputEmail1">Konten</label>
                                        <textarea name="content" class="form-control" id="editor" aria-readonly="true">{{ $data->content }}</textarea>
                                        @error('content')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group" readonly>
                                        <label for="exampleInputPassword1">Kategory</label>
                                        <select name="category_id" id="category_id" readonly>
                                            @foreach($categories as $d)
                                            <option value="{{ $d->id }}" {{ $data->category_id == $d->id ? 'selected' : ''}}>{{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </form>
    </section>
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Detail Berita</h3>

                <!-- <div class="card-tools">
                    <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                </div> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <h5>Message Subject Is Placed Here</h5>
                    <h6>From: support@adminlte.io
                        <span class="mailbox-read-time float-right">15 Feb. 2015 11:03 PM</span>
                    </h6>
                </div>
                <!-- /.mailbox-read-info -->
                <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                            <i class="fas fa-reply"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm" title="Print">
                        <i class="fas fa-print"></i>
                    </button>
                </div>
                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                    <p>Hello John,</p>

                    <p>Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird
                        on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
                        master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
                        gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon
                        asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu
                        blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American
                        Apparel.</p>

                    <p>Raw denim McSweeney's bicycle rights, iPhone trust fund quinoa Neutra VHS kale chips vegan PBR&amp;B
                        literally Thundercats +1. Forage tilde four dollar toast, banjo health goth paleo butcher. Four dollar
                        toast Brooklyn pour-over American Apparel sustainable, lumbersexual listicle gluten-free health goth
                        umami hoodie. Synth Echo Park bicycle rights DIY farm-to-table, retro kogi sriracha dreamcatcher PBR&amp;B
                        flannel hashtag irony Wes Anderson. Lumbersexual Williamsburg Helvetica next level. Cold-pressed
                        slow-carb pop-up normcore Thundercats Portland, cardigan literally meditation lumbersexual crucifix.
                        Wayfarers raw denim paleo Bushwick, keytar Helvetica scenester keffiyeh 8-bit irony mumblecore
                        whatever viral Truffaut.</p>

                    <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny
                        pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar
                        toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo
                        locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney's messenger bag swag
                        slow-carb. Odd Future photo booth pork belly, you probably haven't heard of them actually tofu ennui
                        keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>

                    <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray
                        leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American
                        Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral
                        plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid
                        vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha
                        flannel chambray chia cronut.</p>

                    <p>Thanks,<br>Jane</p>
                </div>
                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    <li>
                        <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1,245 KB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                    <li>
                        <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1,245 KB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                    <li>
                        <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>2.67 MB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                    <li>
                        <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                        <div class="mailbox-attachment-info">
                            <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>1.9 MB</span>
                                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
                <div class="float-right">
                    <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                </div>
                <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.content -->
</div>

@endsection