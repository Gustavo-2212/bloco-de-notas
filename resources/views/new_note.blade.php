<x-main_layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">

                @include("components.top_bar")

                <!-- label and cancel -->
                <div class="row">
                    <div class="col">
                        <p class="display-6 mb-0">NOVA ANOTAÇÃO</p>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route("home") }}" class="btn btn-outline-danger">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>

                <!-- form -->
                <form action="{{ route("create_submit") }}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Título</label>
                                <input type="text" class="form-control bg-primary text-white" name="text_title" value="{{ old("text_title") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Anotação</label>
                                <textarea class="form-control bg-primary text-white" name="text_note" rows="5">{{ old("text_note") }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-end">
                            <a href="{{ route("home") }}" class="btn btn-primary px-5"><i class="fa-solid fa-ban me-2"></i>Cancelar</a>
                            <button type="submit" class="btn btn-secondary px-5"><i class="fa-regular fa-circle-check me-2"></i>Salvar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="group-list m-0">
                    @foreach($errors->all() as $error)
                        <li class="group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</x-main_layout>
