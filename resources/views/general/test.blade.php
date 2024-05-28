

    <div class="sections-profile padding-20 margin-0-auto">
        <div class="section-profile">
            <div class="user-information max-width-727p radius-5 margin-0-auto margin-top-20 margin-bottom-20">
                <h3 class="padding-0-20 padding-top-20">Address</h3>
                <form method="get" action="#" class="form-singup flex flex-fw-w flex-jc-c padding-10 margin-0-auto radius-5">
                    <div class="flex flex-fw-w col-100">
                        <div class="col-33 padding-10">
                            <label for="country" class="">Country</label>
                            <select id="country" name="country" class="col-100 height-36p radius-5">
                                @foreach ($list as $country)
                                    <option value="{{$country->id}}">{{$country->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-33 padding-10">
                            <label for="state" class="">State</label>
                            <select id="state" name="state" class="col-100 height-36p radius-5">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="col-33 padding-10">
                            <label for="city" class="">City</label>
                            <select id="city" name="city" class="col-100 height-36p radius-5">
                                <option value="0"></option>
                            </select>
                        </div>
                        <div class="col-100 padding-10">
                            <label for="address" class="">Rest Of Address</label>
                            <input id="address" type="text" placeholder="Address" class="col-100 height-36p radius-5"/>
                        </div>
                    </div>
                    <div class="flex flex-jc-fe flex-ai-c col-100 padding-10">
                        <div class="">
                            <input class="btn btn-black radius-5 col-100" type="submit" name="submit" value="Save"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/assets/scripts/app.js"></script>
