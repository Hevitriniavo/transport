<style>
  .header {
    text-align: center;
    color: #333; 
    font-size: 32px; 
    font-weight: bold; 
    margin-bottom: 20px;
    animation: fadeIn 2s ease-in-out;
  }

  .bg-image {
    display: block;
    margin: 0 auto; 
    width: 100%; 
    max-width: 1920px; 
    animation: slideIn 2s ease-in-out;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  @keyframes slideIn {
    from {
      transform: translateY(-100%);
    }
    to {
      transform: translateY(0);
    }
  }
</style>

<h1 class="header">TransAmbala project</h1>
<img class="bg-image" src="assets/images/bg.png" alt="bg">
