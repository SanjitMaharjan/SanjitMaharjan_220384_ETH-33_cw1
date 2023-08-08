@include('components.layout')
  
<div class="container-fluid">
        <div class="container">
            <!-- <div class="col-md-10"> -->
                <div class="card">
                    <div class="row Product_Detail">
                        <div class="col-md-6">
                            <div class="images p-5">
                                <div class="text-center p-4"> 
                                    <img class="main-image" id="main-image" src="{{$product->image}}"/> 
                                </div>
                                <div class="thumbnail text-center">
                                    <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <!--Pailo tinta image dekhauna-->
                                            <div class="carousel-item active">
                                                <div class="card-wrapper container-sm d-flex  justify-content-around">
                                                    <div class="card card_slider "  >
                                                        <img  onclick="change_image(this)" src="{{$product->image}}" class="  card-img-top  image" alt="...">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!--Yeta samma tinta-->
                                            
                                        
                                      </div>

                                 </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="product p-4">
                                <div class="tags">
                                    <i class="fa fa-heart text-muted"></i> <i class="fa fa-heart text-muted"></i> 
                                    <a class="nav-link" data-bs-toggle="dropdown"><i class="fa fa-share-alt text-muted"></i>
                                    </a>
                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Site name</span>
                                    <h5 class="text-uppercase">{{$product->name}}</h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price">{{$product->price}}</span>
                                    </div>
                                </div>
                                <p class="about">{{$product->description}}</p>
                                <div class="sizes mt-5">
                                    <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label>
                                </div>
                                <div class="cart mt-4 align-items-center"> 
                                    <div>
                                    <button class="btn text-uppercase btn-primary mr-2 px-4 bg-dark">Add to cart</button> 
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    
                <!-- </div> -->
            </div>
        </div>
    </div>



<script>
    function change_image(image){
    var container = document.getElementById("main-image");
    container.src = image.src;
}
    document.addEventListener("DOMContentLoaded", function(event) {
});
</script>