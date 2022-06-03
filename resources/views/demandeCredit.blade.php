@extends('layouts.master')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/smart.wizard/smart_wizard.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/smart.wizard/smart_wizard_theme_arrows.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/smart.wizard/smart_wizard_theme_circles.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/smart.wizard/smart_wizard_theme_dots.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection

@section('main-content')
  <div class="breadcrumb">
                <h1>Nouvelle Demande de Credit</h1>
                {{-- <ul>
                    <li><a href="">UI Kits</a></li>
                    <li>Smart Wizard</li>
                </ul> --}}
            </div>

            <div class="separator-breadcrumb border-top"></div>
            <div class="row mb-3">
                <div style="display: none" class="col-12 col-lg-6 col-sm-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="theme_selector">Themes</label>
                        </div>
                        <select id="theme_selector" class="custom-select col-lg-6 col-sm-12">
                            <option value="default">default</option>
                            <option value="arrows">arrows</option>
                            <option value="circles">circles</option>
                            <option value="dots">dots</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="col-12 col-lg-6 col-sm-12 d-flex align-items-center">
                    <span class="m-auto"></span>
                    <label>External Buttons:</label>
                    <div class="btn-group col-lg-6 col-sm-12" role="group">
                        <button class="btn btn-secondary" id="prev-btn" type="button">Go Previous</button>
                        <button class="btn btn-secondary" id="next-btn" type="button">Go Next</button>
                        <button class="btn btn-danger" id="reset-btn" type="button">Reset Wizard</button>
                    </div>
                </div> --}}
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- SmartWizard html -->
                    <form id="form" action="{{route('client.demande')}}" method="post">
                        @csrf
                    <div id="smartwizard">
                       
                        <ul>
                            <li><a href="#step-1">Votre projet</a></li>
                            <li><a href="#step-2">Votre situation</a></li>
                            <li><a href="#step-3">Votre activité</a></li>
                            <li><a href="#step-4">Votre logement</a></li>
                        </ul>

                        <div>
                            
                            <div id="step-1" class="">
                          
                                    <div class="form">
                                        <div class="row mb-3">
                                            <div class="col-md">
                                                <label for="picker1">Quel type de prêt recherchez-vous ?</label>
                                                <select name="type_pret" class="form-control">
                                                    <option>Prêt personnel</option>
                                                    <option>Crédit auto neuve</option>
                                                    <option>Crédit auto occasion</option>
                                                    <option>Prêt travaux</option>
                                                    <option>Crédit moto</option>
                                                    <option>micro-credit</option>
                                                    <option>Prêt immobilier</option>
                                                    <option>Rachat de crédit</option>
                                                </select>
                                            </div>
                                            <div class="col-md">
                                                {{-- <label for="validationCustom01">Quel est le montant de votre projet?</label>
                                                <input type="number" class="form-control" id="validationCustom01" placeholder="Ex: 100000" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div> --}}
                                                <label for="validationCustom01">Quel est le montant de votre projet?</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">CFA</span>
                                                    </div>
                                                    <input type="text" name="montant" class="form-control" placeholder="Ex: 100000" aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="i-Cash-register-2"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <label for="picker1">Quelle serait la durée idéale de votre prêt ?</label>
                                                <select name="duree" class="form-control">
                                                    <option>1 an (12 mois)</option>
                                                    <option>2 an (24 mois)</option>
                                                    <option>3 an (12 mois)</option>
                                                    <option>4 an (12 mois)</option>
                                                    <option>5 an (24 mois)</option>
                                                    <option>6 an (12 mois)</option>
                                                </select>
                                            </div>
                                            <div class="col-md"></div>
                                        </div>
                                    </div>
                                
                            </div>
                            <div id="step-2" class="">
                                <div class="form">
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label for="picker1">Quelle est votre situation ?</label>
                                            <select name="situation" class="form-control">
                                                <option>Célibataire</option>
                                                <option>Marié(e)</option>
                                                <option>Divorcé(e)</option>
                                                <option>Union libre</option>
                                                <option>Veuf(ve)</option>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-md">
                                            <label for="validationCustom01">Combien avez-vous d'enfant(s) à charge ?</label>
                                            <input name="nbre_enfant" type="number" class="form-control" id="validationCustom01" placeholder="3" value="" required>
                                            <div class="valid-feedback">
                                                ok
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label for="validationCustom01">Quels sont vos revenus mensuels ?</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">CFA</span>
                                                </div>
                                                <input name="revenu_mensuel" type="text" class="form-control" placeholder="Ex: 100000" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="i-Cash-register-2"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <label for="picker1">Avez-vous d'autre(s) revenu(s) chaque mois ?</label>
                                            <div class="row mt-2">
                                                <label class="radio radio-outline-primary mr-4 ml-4">
                                                    <input onchange="document.getElementById('div_autre_revenu').style='display:block'" id="autre_revenu_oui" type="radio" name="radio" [value]="1" formControlName="radio">
                                                    <span>Oui</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio radio-outline-secondary mr-4 ml-4">
                                                    <input onchange="document.getElementById('div_autre_revenu').style.display='none'" id="autre_revenu_non" type="radio" name="radio" [value]="2" formControlName="radio">
                                                    <span>Non</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md" >
                                           <div id="div_autre_revenu" style="display: none">
                                            <label for="picker1">À combien s'élèvent-ils chaque mois ?</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">CFA</span>
                                                </div>
                                                <input name="autre_revenu_montant" type="text" class="form-control" placeholder="Ex: 100000" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="i-Cash-register-2"></i></span>
                                                </div>
                                            </div>
                                           </div>
                                        </div>
                                        <div class="col-md">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3" class="">
                                <div class="form">
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label for="picker1">Quel est votre secteur d'activité professionnel ?</label>
                                            <div class="row mt-2">
                                                <label class="radio radio-outline-primary mr-4 ml-4">
                                                    <input name="secteur" type="radio" name="radio" [value]="1" formControlName="radio">
                                                    <span>Privé</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio radio-outline-secondary mr-4 ml-4">
                                                    <input name="secteur" type="radio" name="radio" [value]="2" formControlName="radio">
                                                    <span>Public</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio radio-outline-primary mr-4 ml-4">
                                                    <input name="secteur" type="radio" name="radio" [value]="3" formControlName="radio">
                                                    <span>Indépendant</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio radio-outline-secondary mr-4 ml-4">
                                                    <input name="secteur" type="radio" name="radio" [value]="4" formControlName="radio">
                                                    <span>Autre</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="picker1">Quelle est votre catégorie socio-professionnelle ?</label>
                                            <select name="categorie" class="form-control">
                                                <option>Prêt personnel</option>
                                                <option>Crédit auto neuve</option>
                                                <option>Crédit auto occasion</option>
                                                <option>Prêt travaux</option>
                                            </select>
                                        </div>
                                        <div class="col-md">
                                            <label for="picker1">Quel est votre contrat de travail ?</label>
                                            <select name="contrat_travail" class="form-control">
                                                <option>Prêt personnel</option>
                                                <option>Crédit auto neuve</option>
                                                <option>Crédit auto occasion</option>
                                                <option>Prêt travaux</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div id="step-4" class="">
                                <div class="form">
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label for="picker1">Concernant votre logement actuel, vous êtes :</label>
                                            <div class="row mt-2">
                                                <label class="radio radio-outline-primary mr-4 ml-4">
                                                    <input onchange="document.getElementById('loyer_mensuelle').style='display:block'" name="type_logement" type="radio" name="radio" [value]="1" formControlName="radio">
                                                    <span>Locataire</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio radio-outline-secondary mr-4 ml-4">
                                                    <input onchange="document.getElementById('loyer_mensuelle').style='display:none'"  name="type_logement" type="radio" name="radio" [value]="2" formControlName="radio">
                                                    <span>Propriétaire</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio radio-outline-primary mr-4 ml-4">
                                                    <input onchange="document.getElementById('loyer_mensuelle').style='display:none'"  name="type_logement" type="radio" name="radio" [value]="3" formControlName="radio">
                                                    <span>Autre</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <label for="picker1">Avez-vous d'autres charges mensuelles (charges récurrentes comme des pensions alimentaires versées) ?</label>
                                            <div class="row">
                                                <label class="radio radio-outline-primary mr-4 ml-4">
                                                    <input onchange="document.getElementById('charge_mensuelle').style='display:block'" id="autre_charges" type="radio" name="radio" [value]="1" formControlName="radio">
                                                    <span>Oui</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label class="radio radio-outline-secondary mr-4 ml-4">
                                                    <input onchange="document.getElementById('charge_mensuelle').style='display:none'" id="autre_charges" type="radio" name="radio" [value]="2" formControlName="radio">
                                                    <span>Non</span>
                                                    <span class="checkmark"></span>
                                                </label> 
                                            </div>                                          
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md">
                                            <label for="picker1">Quelle est votre adresse postale ? </label>
                                            <input name="add_postal" type="text" class="form-control" id="validationCustom01" placeholder="" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <label for="picker1">Dans quelle ville habitez-vous ?</label>
                                            <input name="ville" type="text" class="form-control" id="validationCustom01" placeholder="" value="" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md" >
                                            <div  id="loyer_mensuelle" style="display: none">
                                                <label for="picker1">À combien s'élève votre loyer mensuel ?</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">CFA</span>
                                                </div>
                                                <input name="loyer_mensuel" type="text" class="form-control" placeholder="" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="i-Cash-register-2"></i></span>
                                                </div>
                                            </div>
                                            </div>
                                           
                                        </div>
                                        <div class="col-md">
                                            <div
                                                id="charge_mensuelle" style="display: none">
                                                <label for="picker1">Quel est le montant de ces charges mensuelles ?</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">CFA</span>
                                                    </div>
                                                    <input name="montant_charge" type="text" class="form-control" placeholder="" aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="i-Cash-register-2"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <button type="submit" class="btn btn-lg btn-primary ladda-button basic-ladda-button mr-auto ml-auto" data-style="expand-right">Envoyer</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                
                    </div>
                </form>
                </div>
            </div>


@endsection

@section('page-js')


 <script src="{{asset('assets/js/vendor/jquery.smartWizard.min.js')}}"></script>

 <script>

 </script>

@endsection

@section('bottom-js')


 <script src="{{asset('assets/js/smart.wizard.script.js')}}"></script>
 <script src="{{asset('assets/js/form.validation.script.js')}}"></script>
 <script src="{{asset('assets/js/vendor/spin.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/ladda.js')}}"></script>
<script src="{{asset('assets/js/ladda.script.js')}}"></script>

@endsection
