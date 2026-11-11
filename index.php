<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PL4NT | Premium RAM HOARDER Supplies Shop</title>
  
  <link rel="stylesheet" href="exam1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  
</head>
<body>

  <!-- Announcement Bar -->
  <div class="announcement-bar py-2 text-center text-dark">
    <i class="bi bi-truck me-2"></i> Free delivery in Seychelles if you give me <strong>SCR 800</strong>!
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="#">
        <i class="bi bi-flower2 text-accent fs-3"></i>
        <span>PL4NT</span>
      </a>
      
      <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
        <i class="bi bi-list fs-2"></i>
      </button>

      <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#shop">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="#categories">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="https://xampp.ramhoarders.dpdns.org/team.html">The Team</a></li>
        </ul>
        
        <div class="d-flex align-items-center gap-3">
          <button class="btn btn-cart text-white position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
            <i class="bi bi-bag-check fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-yellow text-dark" id="cartCount">0</span>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="hero-section text-center text-lg-start">
    <div class="container">
      <div class="row align-items-center gy-5">
        <div class="col-lg-6">
          <span class="badge bg-yellow text-dark px-3 py-2 rounded-pill fs-6 mb-3">🌿 Welcome to DR PL4NT'S' Green Oasis</span>
          <h1 class="display-3 fw-bold text-white mb-4">Beat your WHEATS with the <span class="text-accent">Smack ahh Shovel</span></h1>
          <p class="lead text-light mb-4 opacity-90">Discover Something in my Store I guess.</p>
          <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
            <a href="#shop" class="btn btn-accent px-4 py-3">Explore My stuff <i class="bi bi-arrow-right ms-2"></i></a>
            <a href="#categories" class="btn btn-outline-light px-4 py-3">Browse Something(This button doesnt work by the way)</a>
          </div>
        </div>
        <div class="col-lg-6 text-center">
          <img src="Shovel.jpg" alt="Hero Plants" class="img-fluid rounded-4 shadow-lg border border-success">
        </div>
      </div>
    </div>
  </section>

  <!-- Shop Section -->
  <section id="shop" class="py-5">
    <div class="container py-4">
      <div class="row mb-5 align-items-end">
        <div class="col-md-6">
          <h2 class="display-5 fw-bold text-dark mb-2">My things that i totally didnt steal</h2>
          <p class="text-muted mb-0">Hand-picked By the RAM HOARDER CREW.</p>
        </div>
        <div class="col-md-6 mt-3 mt-md-0">
          <div class="d-flex gap-2 flex-wrap justify-content-md-end">
            <div class="input-group search-box me-md-2 mb-2 mb-md-0" style="max-width: 250px;">
              <span class="input-group-text bg-light border-0"><i class="bi bi-search"></i></span>
              <input type="text" id="searchInput" class="form-control bg-light border-0" placeholder="Search plant...">
            </div>
            <div class="btn-group" role="group">
              <button class="btn btn-outline-dark active filter-btn" data-filter="all">All</button>
              <button class="btn btn-outline-dark filter-btn" data-filter="indoor">Indoor</button>
              <button class="btn btn-outline-dark filter-btn" data-filter="outdoor">Outdoor</button>
              <button class="btn btn-outline-dark filter-btn" data-filter="rare">Rare</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Products Grid -->
      <div class="row g-4" id="productGrid">
        
        <!-- Product 1 -->
        <div class="col-sm-6 col-lg-3 product-item" data-category="outdoor" data-name="The shifter Mister">
          <div class="card product-card">
            <div class="product-img-wrapper position-relative">
              <span class="badge badge-accent position-absolute top-0 start-0 m-3">Worst Seller</span>
              <img src="91935fc4-2c95-43a4-a86f-a7a7e234b898.webp">
            </div>
            <div class="card-body p-4">
              <div class="text-muted small mb-1">Outdoor • Tool</div>
              <h5 class="card-title fw-bold">The shifter Mister</h5>
              <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="price-tag fw-bold">SCR 350</div>
                <button class="btn btn-accent btn-sm rounded-circle add-to-cart" data-id="1" data-name="The shifter Mister" data-price="350">
                  <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M12.5 5v2.5H10v2h2.5V12h2V9.5H17v-2h-2.5V5z"></path><path d="M17.31 14H9.72L5.95 2.68A1 1 0 0 0 5 2H2v2h2.28l3.54 10.63A2 2 0 0 0 9.72 16h7.59a2 2 0 0 0 1.87-1.3l2.76-7.35-1.87-.7zM10 18a2 2 0 1 0 0 4 2 2 0 1 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 1 0 0-4"></path>
</svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 2 -->
        <div class="col-sm-6 col-lg-3 product-item" data-category="outdoor" data-name="BIG BOBY">
          <div class="card product-card">
            <div class="product-img-wrapper position-relative">
              <img src="images (3).jpg">
            </div>
            <div class="card-body p-4">
              <div class="text-muted small mb-1">Outdoor • BIG BOI</div>
              <h5 class="card-title fw-bold">BIG BOBY</h5>
              <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="price-tag fw-bold">SCR 18000</div>
                <button class="btn btn-accent btn-sm rounded-circle add-to-cart" data-id="2" data-name="BIG BOBY" data-price="18000">
                <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M12.5 5v2.5H10v2h2.5V12h2V9.5H17v-2h-2.5V5z"></path><path d="M17.31 14H9.72L5.95 2.68A1 1 0 0 0 5 2H2v2h2.28l3.54 10.63A2 2 0 0 0 9.72 16h7.59a2 2 0 0 0 1.87-1.3l2.76-7.35-1.87-.7zM10 18a2 2 0 1 0 0 4 2 2 0 1 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 1 0 0-4"></path>
</svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="col-sm-6 col-lg-3 product-item" data-category="outdoor" data-name="Carl's TURBO 6000">
          <div class="card product-card">
            <div class="product-img-wrapper position-relative">
              <span class="badge badge-accent position-absolute top-0 start-0 m-3">Best Seller</span>
              <img src="h4sIoIy.jpg">
            </div>
            <div class="card-body p-4">
              <div class="text-muted small mb-1">Outdoor • Not lawn Legal just be careful</div>
              <h5 class="card-title fw-bold">Carl's TURBO "6000"</h5>
              <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="price-tag fw-bold">SCR 1,250</div>
                <button class="btn btn-accent btn-sm rounded-circle add-to-cart" data-id="3" data-name="Carl's TURBO 6000" data-price="1250">
                 <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M12.5 5v2.5H10v2h2.5V12h2V9.5H17v-2h-2.5V5z"></path><path d="M17.31 14H9.72L5.95 2.68A1 1 0 0 0 5 2H2v2h2.28l3.54 10.63A2 2 0 0 0 9.72 16h7.59a2 2 0 0 0 1.87-1.3l2.76-7.35-1.87-.7zM10 18a2 2 0 1 0 0 4 2 2 0 1 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 1 0 0-4"></path>
</svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="col-sm-6 col-lg-3 product-item" data-category="rare" data-name="PL4NT DUST">
          <div class="card product-card">
            <div class="product-img-wrapper position-relative">
              <img src="images (1).jpg">
            </div>
            <div class="card-body p-4">
              <div class="text-muted small mb-1">Rare • Dr pl4nts 'SPECIAL'</div>
              <h5 class="card-title fw-bold">PL4NT DUST</h5>
              <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="price-tag fw-bold">SCR 1500</div>
                <button class="btn btn-accent btn-sm rounded-circle add-to-cart" data-id="4" data-name="PL4NT DUST" data-price="1500">
                  <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M12.5 5v2.5H10v2h2.5V12h2V9.5H17v-2h-2.5V5z"></path><path d="M17.31 14H9.72L5.95 2.68A1 1 0 0 0 5 2H2v2h2.28l3.54 10.63A2 2 0 0 0 9.72 16h7.59a2 2 0 0 0 1.87-1.3l2.76-7.35-1.87-.7zM10 18a2 2 0 1 0 0 4 2 2 0 1 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 1 0 0-4"></path>
</svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 5 -->
        <div class="col-sm-6 col-lg-3 product-item" data-category="indoor" data-name="peace lily sensation">
          <div class="card product-card">
            <div class="product-img-wrapper position-relative">
              <img src="images (2).jpg">
            </div>
            <div class="card-body p-4">
              <div class="text-muted small mb-1">Lung Killer</div>
              <h5 class="card-title fw-bold">Peace Lily</h5>
              <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="price-tag fw-bold">SCR 300</div>
                <button class="btn btn-accent btn-sm rounded-circle add-to-cart" data-id="5" data-name="Peace Lily" data-price="300">
                  <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M12.5 5v2.5H10v2h2.5V12h2V9.5H17v-2h-2.5V5z"></path><path d="M17.31 14H9.72L5.95 2.68A1 1 0 0 0 5 2H2v2h2.28l3.54 10.63A2 2 0 0 0 9.72 16h7.59a2 2 0 0 0 1.87-1.3l2.76-7.35-1.87-.7zM10 18a2 2 0 1 0 0 4 2 2 0 1 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 1 0 0-4"></path>
</svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 6 -->
        <div class="col-sm-6 col-lg-3 product-item" data-category="rare" data-name="Elai">
          <div class="card product-card">
            <div class="product-img-wrapper position-relative">
              <img src="images.jpg">
            </div>
            <div class="card-body p-4">
              <div class="text-muted small mb-1">Rare• Dont ask Just buy</div>
              <h5 class="card-title fw-bold">Elai </h5>
              <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="price-tag fw-bold">SCR 11000000</div>
                <button class="btn btn-accent btn-sm rounded-circle add-to-cart" data-id="6" data-name="Elai" data-price="11000000">
                  <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M12.5 5v2.5H10v2h2.5V12h2V9.5H17v-2h-2.5V5z"></path><path d="M17.31 14H9.72L5.95 2.68A1 1 0 0 0 5 2H2v2h2.28l3.54 10.63A2 2 0 0 0 9.72 16h7.59a2 2 0 0 0 1.87-1.3l2.76-7.35-1.87-.7zM10 18a2 2 0 1 0 0 4 2 2 0 1 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 1 0 0-4"></path>
</svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 7 -->
        <div class="col-sm-6 col-lg-3 product-item" data-category="rare" data-name="Blue moon weed">
          <div class="card product-card">
            <div class="product-img-wrapper position-relative">
              <span class="badge badge-accent position-absolute top-0 start-0 m-3">Trending</span>
              <img src="Gemini_Generated_Image_lj4eoalj4eoalj4e.jpg" class="card-img-top" alt="Ficus Ruby">
            </div>
            <div class="card-body p-4">
              <div class="text-muted small mb-1">The heros favourite</div>
              <h5 class="card-title fw-bold">Blue moon weed</h5>
              <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="price-tag fw-bold">SCR 10000</div>
                <button class="btn btn-accent btn-sm rounded-circle add-to-cart" data-id="7" data-name="Blue moon weed" data-price="10000">
                  <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M12.5 5v2.5H10v2h2.5V12h2V9.5H17v-2h-2.5V5z"></path><path d="M17.31 14H9.72L5.95 2.68A1 1 0 0 0 5 2H2v2h2.28l3.54 10.63A2 2 0 0 0 9.72 16h7.59a2 2 0 0 0 1.87-1.3l2.76-7.35-1.87-.7zM10 18a2 2 0 1 0 0 4 2 2 0 1 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 1 0 0-4"></path>
</svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 8 -->
        <div class="col-sm-6 col-lg-3 product-item" data-category="indoor" data-name="calathea orbifolia">
          <div class="card product-card">
            <div class="product-img-wrapper position-relative">
              <img src="3cb6d2482c74613715d7c28ffe199ebb.jpg">
            </div>
            <div class="card-body p-4">
              <div class="text-muted small mb-1">Pet Friendly(i really need to get rid of him)</div>
              <h5 class="card-title fw-bold">Mr Pibbles</h5>
              <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="price-tag fw-bold">SCR 1000</div>
                <button class="btn btn-accent btn-sm rounded-circle add-to-cart" data-id="8" data-name="Mr Pibbles" data-price="1000">
                  <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24"  
fill="currentColor" viewBox="0 0 24 24" >
<!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
<path d="M12.5 5v2.5H10v2h2.5V12h2V9.5H17v-2h-2.5V5z"></path><path d="M17.31 14H9.72L5.95 2.68A1 1 0 0 0 5 2H2v2h2.28l3.54 10.63A2 2 0 0 0 9.72 16h7.59a2 2 0 0 0 1.87-1.3l2.76-7.35-1.87-.7zM10 18a2 2 0 1 0 0 4 2 2 0 1 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 1 0 0-4"></path>
</svg>
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Offcanvas Cart Drawer -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title fw-bold text-dark"><i class="bi bi-bag me-2"></i> Your Shopping Cart</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
      <div id="cartItemsList" class="flex-grow-1">
        <p class="text-muted text-center my-5" id="emptyCartMsg">Your cart is currently empty.</p>
      </div>
      <div class="border-top pt-3">
        <div class="d-flex justify-content-between mb-2">
          <span>Subtotal</span>
          <strong id="cartSubtotal" class="text-dark">SCR 0.00</strong>
        </div>
        <div class="d-flex justify-content-between mb-3">
          <span>Shipping (Seychelles)</span>
          <span class="text-success fw-bold">Calculated at Checkout</span>
        </div>
        <button class="btn btn-accent w-100 py-3 fw-bold">Proceed to Checkout</button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <a class="navbar-brand d-flex align-items-center gap-2 mb-3" href="#">
            <i class="bi bi-flower2 text-accent fs-3"></i>
            <span class="text-white">PL4NT</span>
          </a>
          <p class="text-light opacity-75"> Seychelles’ undergound Legal Suppliers. Amazing tranquility and freshness for everyone i guess.</p>
        </div>
        <div class="col-6 col-lg-2">
          <h6 class="text-accent fw-bold mb-3">Quick Links</h6>
          <ul class="list-unstyled">
            <li><a href="#home" class="text-light opacity-75 text-decoration-none">Home</a></li>
            <li><a href="#shop" class="text-light opacity-75 text-decoration-none">Shop</a></li>
            <li><a href="#about" class="text-light opacity-75 text-decoration-none">About Us(doesnt work by the way )</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-2">
          <h6 class="text-accent fw-bold mb-3">Support</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light opacity-75 text-decoration-none">Plant Care Guide</a></li>
            <li><a href="#" class="text-light opacity-75 text-decoration-none">Shipping Info</a></li>
            <li><a href="#" class="text-light opacity-75 text-decoration-none">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <h6 class="text-accent fw-bold mb-3">Newsletter</h6>
          <p class="text-light opacity-75">Subscribe for PL4NT care tips & exclusive SCR offers by that meaning i want your money.</p>
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Enter your email">
            <button class="btn btn-accent">Join</button>
          </div>
        </div>
      </div>
      <hr class="my-4 border-secondary opacity-25">
      <div class="text-center text-light opacity-50 small">
        &copy; 2026 PL4NT Inc. All rights reserved. Prices listed in Seychelles Rupee (SCR).
      </div>
    </div>
  </footer>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!--  JavaScript -->
  <script>
    let cart = [];

    // Add to Cart Functionality
    document.querySelectorAll('.add-to-cart').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const id = btn.getAttribute('data-id');
        const name = btn.getAttribute('data-name');
        const price = parseFloat(btn.getAttribute('data-price'));

        const existing = cart.find(item => item.id === id);
        if (existing) {
          existing.qty += 1;
        } else {
          cart.push({ id, name, price, qty: 1 });
        }
        updateCartUI();
      });
    });

    function updateCartUI() {
      const cartCount = document.getElementById('cartCount');
      const cartItemsList = document.getElementById('cartItemsList');
      const cartSubtotal = document.getElementById('cartSubtotal');
      const emptyMsg = document.getElementById('emptyCartMsg');

      const totalItems = cart.reduce((acc, item) => acc + item.qty, 0);
      cartCount.textContent = totalItems;

      if (cart.length === 0) {
        cartItemsList.innerHTML = '<p class="text-muted text-center my-5">Your cart is currently empty.</p>';
        cartSubtotal.textContent = 'SCR 0.00';
        return;
      }

      let html = '';
      let total = 0;

      cart.forEach(item => {
        const itemTotal = item.price * item.qty;
        total += itemTotal;
        html += `
          <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
            <div>
              <h6 class="mb-0 fw-bold">${item.name}</h6>
              <small class="text-muted">SCR ${item.price} x ${item.qty}</small>
            </div>
            <div class="d-flex align-items-center gap-2">
              <span class="fw-bold text-dark">SCR ${itemTotal}</span>
              <button class="btn btn-sm btn-outline-danger py-0 px-2" onclick="removeItem('${item.id}')">&times;</button>
            </div>
          </div>
        `;
      });

      cartItemsList.innerHTML = html;
      cartSubtotal.textContent = `SCR ${total.toFixed(2)}`;
    }

    function removeItem(id) {
      cart = cart.filter(item => item.id !== id);
      updateCartUI();
    }

    // Filter Buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.getAttribute('data-filter');
        document.querySelectorAll('.product-item').forEach(item => {
          if (filter === 'all' || item.getAttribute('data-category') === filter) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });

    // Search Bar Functionality
    document.getElementById('searchInput').addEventListener('keyup', (e) => {
      const query = e.target.value.toLowerCase();
      document.querySelectorAll('.product-item').forEach(item => {
        const name = item.getAttribute('data-name');
        if (name.includes(query)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  </script>
</body>
</html>