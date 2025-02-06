<x-main_layout>
    <div class="container mt-5" style="display: flex; justify-content: center;">
        <div class="col-md-6 col-sm-8">
            <div class="card p-5">
                {{-- Logo --}}
                <div class="text-center p-3">
                    <img src="{{ asset("assets/images/logo.png") }}" alt="Logo bloco de notas">
                </div>

                {{-- Formulário --}}
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">

                        <form action="{{ route("form_submit") }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="text_username" class="form-label">Usuário</label>
                                <input type="text" class="form-control bg-dark text-info" name="text_username" value="{{ old("text_username") }}">
                            </div>

                            <div class="mb-3">
                                <label for="text_password" class="form-label">Senha</label>
                                <input type="password" class="form-control bg-dark text-info" name="text_password" value="{{ old("text_password") }}">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                            </div>
                        </form>

                        {{-- Usuários e Senhas incorretos --}}
                        @if(session("loginError"))
                            <div class="alert alert-danger text-center">
                                {{ session("loginError") }}
                            </div>
                        @endif

                    </div>
                </div>

                {{-- Copy --}}
                <div class="text-center text-secondary mt-3">
                    <small>&copy; {{ date('Y') }} Bloco de Notas</small>
                </div>

                {{-- Errors --}}
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
        </div>
    </div>
</x-main_layout>
