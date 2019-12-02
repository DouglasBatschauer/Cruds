@include('produtos.templates.parciais.header')

<nav class="navbar navbar-expand-lg nav-fill col-12 navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" 
        aria-control="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" style="color: dodgerblue" href="/">Log Out</a>
            <a class="nav-item nav-link" style="color: dodgerblue" href="/adicionar-usuario">Cadastrar Usuario</a>
          </div>
        </div>
</nav>
<div class="divFundo">
	<div class="col-lg-12 col-md-12 col-12 justify-content-center align-items-center table-produtos container">
    	<div class="row container">
    		@yield('content')
    	</div>    
	</div>
</div>	
@include('produtos.templates.parciais.footer')