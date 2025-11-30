@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}?v={{ time() }}">
@endsection

@section('content')
<!-- main -->
<div class="contact__content">

  <div class="contact__heading">
    <h2>Contact</h2>
  </div>

  <form action="/contacts/confirm" method="post">
    @csrf
    <table class="contact-table">
      <tr>
        <th>お名前<span class="required">※</span></th>
        <td class="input__text-name">
          <input class="input__text-lastname" type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
          @error('last_name')
          <div class="form__error">{{ $message }}</div>
          @enderror
          <input class="input__text-firstname" type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
          @error('first_name')
          <div class="form__error">{{ $message }}</div>
          @enderror
        </td>
      </tr>
      <tr>
        <th>性別<span class="required">※</span></th>
        <td class="input__radio">
          <label><input type="radio" name="gender" value="male" {{ old('gender') == 'male'? 'checked' : '' }}> 男性</label>
          <label><input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> 女性</label>
          <label><input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}> その他</label>
          @error('gender')
          <div class="form__error">{{ $message }}</div>
          @enderror
        </td>
      </tr>
      <tr>
        <th>メールアドレス<span class="required">※</span></th>
        <td>
          <input class="input__text" type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
          @error('email')
          <div class="form__error">{{ $message }}</div>
          @enderror
        </td>
      </tr>
      <tr>
        <th>電話番号<span class="required">※</span></th>
        <td class="input__tel">
          <input class="input__tel1" type="tel" name="tel1" placeholder="例：080" value="{{old('tel1')}}"> <span>-</span>
          <input class="input__tel2" type="tel" name="tel2" placeholder="例：1234" value="{{old('tel2')}}"> <span>-</span>
          <input class="input__tel3" type="tel" name="tel3" placeholder="例：5678" value="{{old('tel3')}}">
          @if ($errors->has('tel1'))
          <div class="form__error">{{ $errors->first('tel1') }}</div>
          @elseif ($errors->has('tel2'))
          <div class="form__error">{{ $errors->first('tel2') }}</div>
          @elseif ($errors->has('tel3'))
          <div class="form__error">{{ $errors->first('tel3') }}</div>
          @endif
        </td>
      </tr>
      <tr>
        <th>住所<span class="required">※</span></th>
        <td>
          <input class="input__text" type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
          @error('address')
          <div class="form__error">{{ $message }}</div>
          @enderror
        </td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          <input class="input__text" type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
        </td>
      </tr>
      <tr>
        <th>お問い合わせの種類<span class="required">※</span></th>
        <td>
          <select name="category_id">
            <option value="" disabled {{ old('category_id') == '' ? 'selected' : '' }}>選択してください</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
              {{ old('category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->content }}
            </option>
            @endforeach
          </select>
          @error('category_id')
          <div class="form__error">{{ $message }}</div>
          @enderror
        </td>
      </tr>
      <tr>
        <th>お問い合わせ内容<span class="required">※</span></th>
        <td>
          <textarea name="detail" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
          @error('detail')
          <div class="form__error">{{ $message }}</div>
          @enderror
        </td>
      </tr>
    </table>
    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
  
@endsection