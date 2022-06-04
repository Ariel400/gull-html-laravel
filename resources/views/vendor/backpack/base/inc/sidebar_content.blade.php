{{-- <li class="nav-title">Production</li> --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
        class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
        @if(backpack_user()->hasRole(['admin','Gestionnaire Demande','Gestionnaire Contrat','DG','Recouvreur']))

                <li class="nav-title">Gestion des Demande</li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('contrat') }}'><i class='nav-icon la la-pen'></i> Demandes</a></li>
   
                
                @endif
                @if(backpack_user()->hasRole(['admin','Caissier','Gestionnaire Contrat','DG','Recouvreur']))
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('paiement') }}'><i class='nav-icon la la-dollar'></i> Versements</a></li>
               @endif

                @if(backpack_user()->hasRole(['admin','Gestionnaire Demande','Gestionnaire contentieux','Gestionnaire Comptes','Gestionnaire Contrat','DG','Caissier']))

                <li class="nav-title">Gestion des Clients</li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('clients') }}'><i class='nav-icon la la-user'></i>
        Clients</a></li>
        @endif
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('/v/#/clients') }}'><i
                class="nav-icon la la-first-order"></i>&nbsp; commandes</a></li> --}}


                {{-- @if(backpack_user()->hasRole(['admin','Commercial','Gestionnaire contentieux','DG']))

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('partenaires') }}'><i class='nav-icon la la-support'></i> Fournisseur</a></li>
@endif --}}
{{-- @if(backpack_user()->hasRole('admin','Commercial','DG'))

<li class="nav-title">Gestion Materiel</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('categories') }}'><i class="las la-list"></i> Marque</a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('produits') }}'><i class="lab la-product-hunt"></i>
        Materiels</a></li>
@endif --}}
<!-- Users, Roles, Permissions -->


@if(backpack_user()->hasRole('admin'))

    <li class="nav-title">Paramètres generaux</li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
            <span>Agents</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i>
            <span>Roles</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i>
            <span>Permissions</span></a></li>
    {{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-keybase'></i>
            <span>Settings</span></a></li> --}}

            <li class="nav-title">Paramètres de base</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('config') }}'><i class='nav-icon la la-question'></i> Société Aquerante</a></li>
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pays') }}'><i class='nav-icon la la-question'></i>Pays</a></li> --}}
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('villes') }}'><i class='nav-icon la la-question'></i> Villes</a></li>

<li class="nav-title">Audit</li>

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('revisions') }}'><i class='nav-icon la la-file'></i> Revisions</a></li>
@endif
