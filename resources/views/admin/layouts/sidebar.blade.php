<div class="menu">
    <ion-icon name="menu-outline"></ion-icon>
    <ion-icon name="close-outline"></ion-icon>
</div>

<div class="barra-lateral">
    <div>
        <div class="nombre-pagina">
            <ion-icon id="cloud" name="cloud-outline"></ion-icon>
            <span>Apex</span>
        </div>
{{--         <button class="boton">
            <ion-icon name="add-outline"></ion-icon>
            <span>Create new</span>
        </button> --}}
    </div>

    <nav class="navegacion">
        <ul>
            <li {{-- class="{{ request()->is('admin/dashboard*') ? 'bg-[#EEEEEE] rounded-xl' : '' }}" --}}>
                <a href="{{ route('admin.information') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span {{-- class="{{ request()->is('admin/dashboard*') ? 'text-black' : '' }}" --}}>Información</span>
                </a>
            </li>
            {{-- <li>
                <a href="">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Mensajes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Suscripciones</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('categories.index') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Categorias de productos</span>
                </a>
                {{-- <a href="{{ route('categories.index') }}" class="{{ request()->is('admin/products/categories*') ? 'bg-[#EEEEEE] rounded-xl' : '' }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span class="{{ request()->is('admin/products/categories*') ? 'text-black' : '' }}" >Categorías de productos</span>
                </a> --}}
            </li>
            <li>
                <a href="{{ route('products.index') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Productos</span>
                </a>
            </li>

            <li>
                <a href="{{ route('highlighted.index') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Nuestro Alcance</span>
                </a>
            </li>

            <li>
                <a href="{{ route('partners.index') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Nuestros Aliados</span>
                </a>
            </li>

            <li>
                <a href="{{ route('categoriesOfArticles.index') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Categorías de blog</span>
                </a>
            </li>

            <li>
                <a href="{{ route('articles.index') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Blogs</span>
                </a>
            </li>


        </ul>
    </nav>

    <div>
        <div class="linea"></div>

        <div class="modo-oscuro">
            <div class="info">
                <ion-icon name="moon-outline"></ion-icon>
                <span>Drak Mode</span>
            </div>
            <div class="switch">
                <div class="base">
                    <div class="circulo"></div>
                </div>
            </div>
        </div>

        <div class="usuario">

            <img src="{{ $admin->imagen_perfil ? asset('storage/users/' . $admin->imagen_perfil) : asset('images/img/avatar.png') }}"
                alt="{{ $admin->name }}" class="!rounded-full size-12">

            <div class="info-usuario">
                <div class="nombre-email">
                    <span class="nombre capitalize">{{ $admin->name }}</span>
                    <span class="email">{{ $admin->email }}</span>
                </div>
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button class="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
