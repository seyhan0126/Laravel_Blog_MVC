@if(Auth::user())

<footer class="page-footer my-0 py-0 text-lg-start" style="background-color: lightgray; position: relative;" >
  <section class="d-flex justify-content-center justify-content-lg-between p-0 border-bottom">
    <div class="row px-4 justify-content-center d-lg-block">
      <span class="pb-2 px-5">Get connected with us on social networks:</span>
    <div>
  </div>
  </section>
  <section class="mx-auto mt-2 px-5">
    <div class="row p-0 m-0 ">
        <div class="col-12 col-sm-3 col-md-3 col-lg-3 m-0">
          <h6 class="text-uppercase fw-bold">
           Company name
          </h6>
          <p class="text-justify">
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        
        <div class="col-4 col-sm-3 col-md-3 col-lg-3 px-5 my-0 mx-auto p-0">
          <h6 class="text-uppercase fw-bold m-0">
            Products
          </h6>
          <p class="my-0">
            <a href="#!" class="text-reset m-0 p-0">Angular</a>
          </p>
          <p class="my-0">
            <a href="#!" class="text-reset m-0 p-0">React</a>
          </p>
          <p class="my-0">
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p class="my-0">
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
      
        <div class="col-4 col-sm-3 col-md-3 col-lg-3 px-5 my-0 mx-auto my-0">
         
          <h6 class="text-uppercase fw-bold m-0">
            Useful links
          </h6>
          <p class="p-0 my-0">
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p class="p-0 my-0">
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p class="p-0 my-0">
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p class="p-0 my-0">
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        
        <div class="col-4 col-sm-3 col-md-3 col-lg-3 px-5 my-0 mx-sm-auto">
          
          <h6 class="text-uppercase px-0 fw-bold m-0">
            Contact
          </h6>
          <p class="m-0">Varna 9000, US</p>
          <p class="m-0">nfo@example.com</p>
          <p class="m-0">+ 01 234 567 88</p>
          <p class="m-0">+ 01 234 567 89</p>
        </div>         
     </div>
  </section>
  <div class="text-center p-0 m-0" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset m-0 p-0 fw-bold">S.Mustafov@exampledev.com</a>
  </div>
</footer>
@endif