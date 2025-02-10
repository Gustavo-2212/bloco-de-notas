<x-main_layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">

                @include("components.top_bar")

                @if(count($notes) == 0)
                    <!-- no notes available -->
                    <div class="row mt-5">
                        <div class="col text-center">
                            <p class="display-6 mb-5 text-secondary opacity-50">Você não tem nenhuma anotação!</p>
                            <a href="{{ route("novo") }}" class="btn btn-secondary btn-lg p-3 px-5">
                                <i class="fa-regular fa-pen-to-square me-3"></i>Crie sua primeira anotação
                            </a>
                        </div>
                    </div>
                @else
                    <!-- notes are available -->
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route("novo") }}" class="btn btn-secondary px-3">
                            <i class="fa-regular fa-pen-to-square me-2"></i>Add Anotação
                        </a>
                    </div>
                    @foreach($notes as $note)
                        @include("components.note")
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</x-main_layout>
