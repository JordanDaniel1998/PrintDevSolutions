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
        <button class="boton">
            <ion-icon name="add-outline"></ion-icon>
            <span>Create new</span>
        </button>
    </div>

    <nav class="navegacion">
        <ul>
            <li>
                <a href="#">
                    <ion-icon name="mail-unread-outline"></ion-icon>
                    <span>Estadísticas</span>
                </a>
            </li>

            {{-- <li>
                <a href="{{ route('products.index') }}">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Productos</span>
                </a>
            </li> --}}

            <li class="{{ request()->is('admin/products*') ? 'bg-[#EEEEEE] rounded-xl' : '' }}">
                <a href="{{ route('products.index') }}">
                    <ion-icon name="star-outline" class="{{ request()->is('admin/products*') ? 'text-black' : '' }}"></ion-icon>
                    <span class="{{ request()->is('admin/products*') ? 'text-black' : '' }}">Productos</span>
                </a>
            </li>

            <!--  <li>
          <a href="#">
          <span>Productos</span>
          </a>
        </li> -->

            <li>
                <a href="#">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>Starred</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="paper-plane-outline"></ion-icon>
                    <span>Sent</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="document-text-outline"></ion-icon>
                    <span>Drafts</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="bookmark-outline"></ion-icon>
                    <span>Important</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                    <span>Spam</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <ion-icon name="trash-outline"></ion-icon>
                    <span>Trash</span>
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
            <img src="" alt="" />
            <div class="info-usuario">
                <div class="nombre-email">
                    <span class="nombre">Jhampier</span>
                    <span class="email">jhampier@gmail.com</span>
                </div>
                <ion-icon name="ellipsis-vertical-outline"></ion-icon>
            </div>
        </div>
    </div>
</div>
