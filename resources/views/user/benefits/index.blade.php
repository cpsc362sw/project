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
                        
                        <form method="post"action="{{ url('user/benefits') }}">
                            {{ csrf_field() }}
                            Health Insurance Carrier:
                            <select name="health">
                                <option value="Blue Shield HMO"<?php if($benefits->health == "Blue Shield HMO"){ echo "selected";}?>>Blue Shield Health Care HMO</option>
                                <option value="Blue Shield PPO"<?php if($benefits->health == "Blue Shield PPO"){ echo "selected";}?>>Blue Shield Health Care PPO</option>
                                <option value="Blue Cross HMO"<?php if($benefits->health == "Blue Cross HMO"){ echo "selected";}?>>Blue Cross Health Care HMO</option>
                                <option value="Blue Cross PPO"<?php if($benefits->health == "Blue Cross PPO"){ echo "selected";}?>>Blue Cross Health care PPO</option>
                                <option value="Kaiser HMO"<?php if($benefits->health == "Kaiser HMO"){ echo "selected";}?>>Kaiser Health Care HMO</option>
                                <option value="CIGNA HMO"<?php if($benefits->health == "CIGNA HMO"){ echo "selected";}?>>Cigna Dental HMO</option>
                            </select><br><br>
                            
                            Vision Carrier:
                            <select name="vision">
                                <option value="VSP">VSP Vision</option>
                            </select><br><br>
                            
                            Dental Carrier:
                            <select name="dental">
                                <option value="CIGNA HMO"<?php if($benefits->dental == "CIGNA HMO"){ echo "selected";}?>>Cigna Dental HMO</option>
                                <option value="Delta"<?php if($benefits->dental == "Delta"){ echo "selected";}?>>Delta Dental</option>
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
                            <input type="text" name="firstname1" placeholder="First Name" value="{{ @$benefits->first_1 }}">
                            <input type="text" name="lastname1" placeholder="Last Name"value="{{ @$benefits->last_1 }}">
                            Relationship:
                            <select name="relation1">
                                <option value="spouse1"<?php if($benefits->relation_1 == "spouse1"){ echo "selected";}?>>Spouse</option>
                                <option value="child1"<?php if($benefits->relation_1 == "child1"){ echo "selected";}?>>Child</option>
                                <option value="other1"<?php if($benefits->relation_1 == "other1"){ echo "selected";}?>>Other</option>
                            </select><br>
                            
                            Dependent #2:
                            <input type="text" name="firstname2" placeholder="First Name" value="{{ @$benefits->first_2 }}">
                            <input type="text" name="lastname2" placeholder="Last Name" value="{{ @$benefits->last_2 }}">
                            Relationship:
                            <select name="relation2">
                                <option value="spouse2"<?php if($benefits->relation_2 == "spouse2"){ echo "selected";}?>>Spouse</option>
                                <option value="child2"<?php if($benefits->relation_2 == "child2"){ echo "selected";}?>>Child</option>
                                <option value="other2"<?php if($benefits->relation_2 == "other2"){ echo "selected";}?>>Other</option>
                            </select><br>
                            
                            Dependent #3:
                            <input type="text" name="firstname3" placeholder="First Name" value="{{ @$benefits->first_3 }}">
                            <input type="text" name="lastname3" placeholder="Last Name" value="{{ @$benefits->last_3 }}">
                            Relationship:
                            <select name="relation3">
                                <option value="spouse3"<?php if($benefits->relation_3 == "spouse3"){ echo "selected";}?>>Spouse</option>
                                <option value="child3"<?php if($benefits->relation_3 == "child3"){ echo "selected";}?>>Child</option>
                                <option value="other3"<?php if($benefits->relation_3 == "other3"){ echo "selected";}?>>Other</option>
                            </select><br>
                            
                            Dependent #4:
                            <input type="text" name="firstname4" placeholder="First Name" value="{{ @$benefits->first_4 }}">
                            <input type="text" name="lastname4" placeholder="Last Name" value="{{ @$benefits->last_4 }}">
                            Relationship:
                            <select name="relation4">
                                <option value="spouse4"<?php if($benefits->relation_4 == "spouse4"){ echo "selected";}?>>Spouse</option>
                                <option value="child4"<?php if($benefits->relation_4 == "child4"){ echo "selected";}?>>Child</option>
                                <option value="other4"<?php if($benefits->relation_4 == "other4"){ echo "selected";}?>>Other</option>
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
