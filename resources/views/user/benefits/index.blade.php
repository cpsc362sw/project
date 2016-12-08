@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading panel-user">
                        <div class="user-detail-left">
                            <img class="thumb img-thumbnail rounded float-xs-left" src="{{ URL::asset('/img/default-placeholder.png') }}">
                            <div class="user-info-left">
                                <label class="large-title">{{ ucwords($user->name) }}</label>
                                <label>User ID: {{ $user->id }}</label>
                            </div>
                        </div>
                        <div class="user-detail-right">
                            <div class="user-info-right">
                                <label class="my-messages"><i class="fa fa-envelope" aria-hidden="true"></i> My Messages</label>
                                <label class="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control"/>
                                        <span class="input-group-addon">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>User</b> Dashboard <i class="fa fa-angle-right" aria-hidden="true"></i> Benefits <i class="fa fa-angle-right" aria-hidden="true"></i> Edit</div>
                    <div class="panel-body" style="font-size: 120%;">
                        
                        <form>
                            Health Insurance Carrier:
                            <select name="health">
                                <option value="Blue Shield HMO">Blue Shield Health Care HMO</option>
                                <option value="Blue Shield PPO">Blue Shield Health Care PPO</option>
                                <option value="Blue Cross HMO">Blue Cross Health Care HMO</option>
                                <option value="Blue Cross PPO">Blue Cross Health care PPO</option>
                                <option value="Kaiser HMO">Kaiser Health Care HMO</option>
                                <option value="CIGNA HMO">Cigna Dental HMO</option>
                            </select><br><br>
                            
                            Vision Carrier:
                            <select name="vision">
                                <option value="VSP">VSP Vision</option>
                            </select><br><br>
                            
                            Dental Carrier:
                            <select name="dental">
                                <option value="CIGNA HMO">Cigna Dental HMO</option>
                                <option value="Delta">Delta Dental</option>
                            </select><br><br>
                            
                            Life Carrier:
                            <select name="life">
                                <option value="MetLife">MetLife Life Insurance</option>
                            </select><br><br>
                            
                            Retirement Carrier:
                            <select name="retirement">
                                <option value="Fidelity">Fidelity</option>
                            </select><br><br>
                            
                            Beneficiaries:<br>
                            Dependent #1:
                            <input type="text" name="firstname1" placeholder="First Name">
                            <input type="text" name="lastname1" placeholder="Last Name">
                            Relationship:
                            <select>
                                <option value="spouse1">Spouse</option>
                                <option value="child1">Child</option>
                                <option value="other1">Other</option>
                            </select><br>
                            
                            Dependent #2:
                            <input type="text" name="firstname2" placeholder="First Name">
                            <input type="text" name="lastname2" placeholder="Last Name">
                            Relationship:
                            <select>
                                <option value="spouse2">Spouse</option>
                                <option value="child2">Child</option>
                                <option value="other2">Other</option>
                            </select><br>
                            
                            Dependent #3:
                            <input type="text" name="firstname3" placeholder="First Name">
                            <input type="text" name="lastname3" placeholder="Last Name">
                            Relationship:
                            <select>
                                <option value="spouse3">Spouse</option>
                                <option value="child3">Child</option>
                                <option value="other3">Other</option>
                            </select><br>
                            
                            Dependent #4:
                            <input type="text" name="firstname4" placeholder="First Name">
                            <input type="text" name="lastname4" placeholder="Last Name">
                            Relationship:
                            <select>
                                <option value="spouse4">Spouse</option>
                                <option value="child4">Child</option>
                                <option value="other4">Other</option>
                            </select><br><br>
                            
                            Expiration Date:
                            <input type="text" name="Expiration Date" value="5/21/2017" readonly><br><br>
                            
                            <input type="submit" value="Submit">
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
