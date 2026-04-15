@extends('layouts.admin')
@include('partials/admin.theme.nav', ['activeTab' => 'nova'])

@section('title')
    Nova Theme Settings
@endsection

@section('content-header')
    <h1>Nova Theme<small>Advanced customization for the modern Nova theme.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Nova Theme</li>
    </ol>
@endsection

@section('content')
    @yield('theme::nav')
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ route('admin.theme.nova.update') }}" method="POST">
                
                {{-- Glassmorphism Settings --}}
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-magic"></i> Glassmorphism Effects</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Enable Glassmorphism</label>
                                <div>
                                    <select class="form-control" name="glassmorphism">
                                        <option value="1" @if(empty($theme) || $theme->glassmorphism !== '0') selected @endif>Enabled</option>
                                        <option value="0" @if(!empty($theme) && $theme->glassmorphism === '0') selected @endif>Disabled</option>
                                    </select>
                                    <p class="text-muted"><small>Adds frosted glass effects to panels and cards.</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Glass Blur Amount (px)</label>
                                <div>
                                    <input type="number" class="form-control" name="glassblur" min="0" max="50" 
                                        @if(!empty($theme)) value="{{ $theme->glassblur ?? '16' }}" @else value="16" @endif />
                                    <p class="text-muted"><small>Higher values = more blur (recommended: 10-20)</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Glass Saturation (%)</label>
                                <div>
                                    <input type="number" class="form-control" name="glasssaturation" min="100" max="200" 
                                        @if(!empty($theme)) value="{{ $theme->glasssaturation ?? '180' }}" @else value="180" @endif />
                                    <p class="text-muted"><small>Color saturation of glass elements (100-200)</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Glass Background Dark</label>
                                <div>
                                    <input type="color" class="form-control" name="glassbg" 
                                        @if(!empty($theme)) value="{{ $theme->glassbg ?? '#1e293b80' }}" @else value="#1e293b80" @endif />
                                    <p class="text-muted"><small>Dark mode glass panel color (with alpha)</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Glass Background Light</label>
                                <div>
                                    <input type="color" class="form-control" name="glassbglight" 
                                        @if(!empty($theme)) value="{{ $theme->glassbglight ?? '#1e293b66' }}" @else value="#1e293b66" @endif />
                                    <p class="text-muted"><small>Lighter glass variant color</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Glass Border Color</label>
                                <div>
                                    <input type="color" class="form-control" name="glassborder" 
                                        @if(!empty($theme)) value="{{ $theme->glassborder ?? '#ffffff14' }}" @else value="#ffffff14" @endif />
                                    <p class="text-muted"><small>Border color for glass elements</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Animation Settings --}}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-film"></i> Animations & Effects</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Enable Animations</label>
                                <div>
                                    <select class="form-control" name="animations">
                                        <option value="1" @if(empty($theme) || $theme->animations !== '0') selected @endif>Enabled</option>
                                        <option value="0" @if(!empty($theme) && $theme->animations === '0') selected @endif>Disabled</option>
                                    </select>
                                    <p class="text-muted"><small>Enable smooth transitions and animations.</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Enable Glow Effects</label>
                                <div>
                                    <select class="form-control" name="gloweffects">
                                        <option value="1" @if(empty($theme) || $theme->gloweffects !== '0') selected @endif>Enabled</option>
                                        <option value="0" @if(!empty($theme) && $theme->gloweffects === '0') selected @endif>Disabled</option>
                                    </select>
                                    <p class="text-muted"><small>Adds glowing effects to primary elements.</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Enable Gradient Text</label>
                                <div>
                                    <select class="form-control" name="gradienttext">
                                        <option value="1" @if(!empty($theme) && $theme->gradienttext === '1') selected @endif>Enabled</option>
                                        <option value="0" @if(empty($theme) || $theme->gradienttext !== '1') selected @endif>Disabled</option>
                                    </select>
                                    <p class="text-muted"><small>Adds gradient effects to headings.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Animated Background</label>
                                <div>
                                    <select class="form-control" name="animatedbg">
                                        <option value="0" @if(empty($theme) || $theme->animatedbg !== '1') selected @endif>Disabled</option>
                                        <option value="1" @if(!empty($theme) && $theme->animatedbg === '1') selected @endif>Enabled</option>
                                    </select>
                                    <p class="text-muted"><small>Animated gradient background effect.</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Animation Speed (seconds)</label>
                                <div>
                                    <input type="number" class="form-control" name="animatedbgspeed" min="5" max="60" 
                                        @if(!empty($theme)) value="{{ $theme->animatedbgspeed ?? '15' }}" @else value="15" @endif />
                                    <p class="text-muted"><small>Speed of animated background (5-60 seconds)</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Accent Colors --}}
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-paint-brush"></i> Accent Colors (Dark Mode)</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label class="control-label">Cyan</label>
                                <div>
                                    <input type="color" class="form-control" name="accentcyan" 
                                        @if(!empty($theme)) value="{{ $theme->accentcyan ?? '#2DDAFD' }}" @else value="#2DDAFD" @endif />
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">Purple</label>
                                <div>
                                    <input type="color" class="form-control" name="accentpurple" 
                                        @if(!empty($theme)) value="{{ $theme->accentpurple ?? '#A78BFA' }}" @else value="#A78BFA" @endif />
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">Pink</label>
                                <div>
                                    <input type="color" class="form-control" name="accentpink" 
                                        @if(!empty($theme)) value="{{ $theme->accentpink ?? '#F472B6' }}" @else value="#F472B6" @endif />
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">Orange</label>
                                <div>
                                    <input type="color" class="form-control" name="accentorange" 
                                        @if(!empty($theme)) value="{{ $theme->accentorange ?? '#FB923C' }}" @else value="#FB923C" @endif />
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">Green</label>
                                <div>
                                    <input type="color" class="form-control" name="accentgreen" 
                                        @if(!empty($theme)) value="{{ $theme->accentgreen ?? '#4ADE80' }}" @else value="#4ADE80" @endif />
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label">Yellow</label>
                                <div>
                                    <input type="color" class="form-control" name="accentyellow" 
                                        @if(!empty($theme)) value="{{ $theme->accentyellow ?? '#FACC15' }}" @else value="#FACC15" @endif />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Glow Colors --}}
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-lightbulb-o"></i> Glow Effects</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Primary Glow Color</label>
                                <div>
                                    <input type="color" class="form-control" name="primaryglow" 
                                        @if(!empty($theme)) value="{{ $theme->primaryglow ?? '#6366f166' }}" @else value="#6366f166" @endif />
                                    <p class="text-muted"><small>Shadow color for primary buttons (with alpha)</small></p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Accent Glow Color</label>
                                <div>
                                    <input type="color" class="form-control" name="glowcolor" 
                                        @if(!empty($theme)) value="{{ $theme->glowcolor ?? '#2DDAFD4D' }}" @else value="#2DDAFD4D" @endif />
                                    <p class="text-muted"><small>General glow effect color (with alpha)</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-sm btn-primary pull-right">Save Nova Settings</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
