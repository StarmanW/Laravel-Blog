<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/">StarmanW Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if(preg_match('/^(\/|\/index.php)$/', $_SERVER['REQUEST_URI'])) echo "active"?>">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item <?php if($_SERVER['REQUEST_URI'] === '/about') echo "active"?>">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item <?php if($_SERVER['REQUEST_URI'] === '/services') echo "active"?>">
                <a class="nav-link" href="/services">Services</a>
            </li>
            <li class="nav-item dropdown">
                <span class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blogs</span>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="/posts">Browse Blogs</a>
                    <a class="dropdown-item" href="/posts/create">Create New Blog</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>