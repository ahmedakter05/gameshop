<!-- Page-head 
<head><?php echo $map['js']; ?></head>
<body><?php echo $map['html']; ?></body>-->
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Contact Us</h3>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li>You are here:</li>
                    <li><a href="#">Home</a></li>
                    <li class="active">Contact Us</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Page-head -->


<div class="space50"></div>

<!-- Contact Wrap -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="Section-title"><span>Send Us a Mesage</span></h4>
            <div class="space25"></div>
            
            <div class="space40"></div>
            <div class="col-lg-12 no-padding r-quote">
                <h5>Hi, Wellcome to TechFocus</h5>
                <p>Focusing on Technology</p>
                <div class="contact-info insidequote">
                    <div class="space25"></div>
                    <p><?php echo '<b>' . $contacts['0']['name'] . '</b>' . ': ' . $contacts['0']['description']; ?></p>
                    
                    <p><?php echo '<b>' . $contacts['1']['name'] . '</b>' . ': ' . $contacts['1']['description']; ?></p>
                    <p><?php echo '<b>' . $contacts['2']['name'] . '</b>' . ': ' . anchor('to:'.$contacts['2']['description'], $contacts['2']['description']);?></p>
                </div>
                <div class="sep"></div>
                <div class="insidequote">
                    <p><?php echo $contacts['6']['name'] ?></p>
                </div>
                <?php echo $contacts['6']['description'] ?>
                
                <form>
                    <input type="text" class="form-control form-email" placeholder="Type your email...">
                    <div class="space15"></div>

                    <input type="text" class="form-control form-email" placeholder="Type your email...">
                    <div class="space15"></div>
                        
                    <textarea rows="8" class="form-control" name="comment" id="comment" placeholder="Your message..."></textarea>
                    <div class="space15"></div>
                    <div class="form-btn-wrap">
                        <button class="button-blue btn form-control" type="button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
           <h4 class="Section-title"><span><?php echo $contacts['5']['name'] ?></span></h4>
            <div class="space40"></div>
            <?php echo $map['js']; ?>
            <?php echo $map['html']; ?>
            
        </div>
    </div>
</div>

<!-- Contact Wrap -->

<div class="space90"></div>