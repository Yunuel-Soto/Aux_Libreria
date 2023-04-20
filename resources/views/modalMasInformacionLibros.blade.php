<!-- Modal -->
<div class="modal fade" id="modalMasInformacionLibros{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalMasInformacionLibros" aria-hidden="true">
    <div class="modal-dialog m-dialog">
        <div class="modal-content content-libro m-content">

            <div class="modal-body m-body">
                <button type="button" class="btn-cerrar" data-bs-dismiss="modal" aria-label="Close"> <a
                        class="close"><img src="/img/close.png" alt=""></a>
                </button>

                <div class="content-img">
                    <div class="dispo">{{ $libro->disponibles }} DISPONIBLES</div>
                    <img src="/img/portadas/{{ $libro->imagen }}" alt="Portada" class="portada-libro">
                </div>
                <div class="content-info">
                    <h1 class="titulo-masInfo">{{ $libro->titulo }}</h1>
                    <p class="p-masInfo">Edicion: {{ $libro->edicion }}</p>
                    <p class="p-masInfo">Editorial: {{ $libro->editorial }}</p>
                    <p class="p-masInfo">Autor: {{ $libro->autor }}</p>
                    <p class="p-masInfo">Area: {{ $libro->carrera }}</p>
                    <p class="p-masInfo">Descripcion: {{ $libro->tipo }}</p>
                </div>

            </div>

        </div>
    </div>
</div>
