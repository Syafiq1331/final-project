@extends('layouts.header')

@section('title', 'Page not found')
<body style="display: grid; place-items: center; height: 100vh;">
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-warning"> 404</h2>

      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
        <p>
          We could not find the page you were looking for.
          Meanwhile, you may <a href="/login">return to login page</a>
        </p>
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
</body>

</html>