@extends('base::layouts.main', ['pagetitle' => 'Webshop / Registratie'])

@section('title')
    <h3>Registratie aanvragen</h3>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <form method="POST" role="form">
                {{ csrf_field() }}

                <p class="help-block">Velden gemarkeerd met een * zijn verplicht</p>

                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="underline">Gegevens contactpersoon</h3>

                        <div class="form-group">
                            <label for="contact-name">Naam*</label>
                            <input type="text" class="form-control" placeholder="Naam" name="contact-name" value='{{ old('contact-name') }}' required>
                        </div>

                        <div class="form-group">
                            <label for="contact-phone">Telefoon</label>
                            <input type="text" class="form-control" placeholder="Telefoon" name="contact-phone" value='{{ old('contact-phone') }}'>
                        </div>

                        <div class="form-group">
                            <label for="contact-email">E-mail adres*</label>
                            <input type="email" class="form-control" placeholder="E-mail adres" name="contact-email" value='{{ old('contact-email') }}' required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <h3 class="underline">Gegevens bedrijf</h3>

                        <div class="form-group">
                            <label for="company-name">Naam*</label>
                            <input type="text" class="form-control" placeholder="Naam" name="company-name" value='{{ old('company-name') }}' required>
                        </div>

                        <div class="form-group">
                            <label for="company-address">Adres & Huisnr*</label>
                            <input type="text" class="form-control" placeholder="Adres & Huisnr" name="company-address" value='{{ old('company-address') }}' required>
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-3">
                                <div class="form-group">
                                    <label for="company-postcode">Postcode*</label>
                                    <input type="text" class="form-control" placeholder="Postcode" name="company-postcode" value='{{ old('company-postcode') }}' required>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-9">
                                <div class="form-group">
                                    <label for="company-city">Plaats*</label>
                                    <input type="text" class="form-control" placeholder="Plaats" name="company-city" value='{{ old('company-city') }}' required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="company-phone">Telefoon*</label>
                            <input type="text" class="form-control" placeholder="Telefoon" name="company-phone" value='{{ old('company-phone') }}' required>
                        </div>

                        <div class="form-group">
                            <label for="company-website">Website</label>
                            <div class="input-group">
                                <span class="input-group-addon" id="url-prefix">http://</span>
                                <input type="url" class="form-control" placeholder="Website" name="company-website" value='{{ old('company-website') }}' aria-describedby="url-prefix">
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="underline">Betalingsgegevens</h3>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="iban">IBAN*</label>
                            <input type="text" class="form-control" placeholder="IBAN" name="iban" value='{{ old('iban') }}' required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="kvk">KvK*</label>
                            <input type="text" class="form-control" placeholder="KvK" name="kvk" value='{{ old('kvk') }}' required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="btw">BTW nummer*</label>
                            <input type="text" class="form-control" placeholder="BTW nummer" name="btw" value='{{ old('btw') }}' required>
                        </div>
                    </div>
                </div>

                <h3 class="underline">Overige gegevens</h3>

                <div class="form-group">
                    <label for="invoice-email">Vanaf 2015 factureren wij digitaal. <br />Indien u dit naar een afwijkend mailadres wilt sturen kunt u dat hier invullen.</label>
                    <input type="email" placeholder="Alternative email" class="form-control" name="invoice-email" value='{{ old('invoice-email') }}'>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="order" {{ old('order') ? 'checked' : null }}> Digitale orderbevestiging ontvangen
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="product-file" {{ old('product-file') ? 'checked' : null }}> Mail ontvangen bij nieuw artikelbestand
                    </label>
                </div>

                <br />

                <button type="submit" class="btn btn-primary">Versturen</button>
            </form>
        </div>
    </div>
@endsection

@section('extraJS')
    <script type="text/javascript">
        $("#corIsDel").change(function() {
            if ($(this).is(":checked")) {
                $('#delAddress').val($('#corAddress').val()).attr('readonly', 'readonly');
                $('#delPostcode').val($('#corPostcode').val()).attr('readonly', 'readonly');
                $('#delCity').val($('#corCity').val()).attr('readonly', 'readonly');
                $('#delPhone').val($('#corPhone').val()).attr('readonly', 'readonly');
                $('#delFax').val($('#corFax').val()).attr('readonly', 'readonly');
            } else {
                $('#delAddress').val("").removeAttr('readonly');
                $('#delPostcode').val("").removeAttr('readonly');
                $('#delCity').val("").removeAttr('readonly');
                $('#delPhone').val("").removeAttr('readonly');
                $('#delFax').val("").removeAttr('readonly');
            }
        });
    </script>
@endsection
