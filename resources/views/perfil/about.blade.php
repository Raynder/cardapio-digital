<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ isset($user->foto) ? asset($user->foto) : asset('img/admin/avatar.png') }}" alt="User profile picture">
                    </div>

        <h3 class="profile-username text-center"></h3>

        <p class="text-muted text-center">
            Teste</p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Seguidores</b> <a class="float-right">1,322</a>
            </li>
            <li class="list-group-item">
                <b>Seguindo</b> <a class="float-right">543</a>
            </li>
        </ul>

    </div>
</div>