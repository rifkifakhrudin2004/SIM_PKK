@extends('layoutsAnggota.template')

@section('content')
<div class="container">
    <h2>Edit Arisan</h2>
    <form action="{{ route('arisan.update', $arisan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_anggota">Anggota</label>
            <select name="id_anggota" id="id_anggota" class="form-control" required>
                @foreach($anggota as $member)
                    <option value="{{ $member->id }}" @if($member->id == $arisan->id_anggota) selected @endif>{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_bendahara">Bendahara</label>
            <select name="id_bendahara" id="id_bendahara" class="form-control" required>
                @foreach($anggota as $member)
                    <option value="{{ $member->id }}" @if($member->id == $arisan->id_bendahara) selected @endif>{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tgl_arisan">Tanggal Arisan</label>
            <input type="date" name="tgl_arisan" id="tgl_arisan" class="form-control
