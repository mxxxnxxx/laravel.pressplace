import React, { useState, useEffect } from 'react';
import axios from 'axios';


const PostalCode = () => {
  // hooksのstateを定義
  const [firstCodeCount, setFirstCodeCount] = useState({count: 0});
  const [firstCodeValue, setFirstCodeValue] = useState({value: ''});
  const [lastCodeCount, setLastCodeCount] = useState({count: 0});
  const [lastCodeValue, setLastCodeValue] = useState({value: ''});
  useEffect(() => {
    if (firstCodeCount.count + lastCodeCount.count === 7) {
      postalSearch()
    }
  }, [firstCodeCount, lastCodeCount])
  // 検索を行うメソッド
  const postalSearch = async () => {
    
      // dbへのurlを定義
      // フォーム上のfirst_codeとlast_codeを取得してurlとして定数を定義
      // /ajax/postal_search?がパスパラメータでそれ以降が検索に使う郵便番号のクエリパラメーター
    let url = '/ajax/postal_search?' + [
      'first_code=' + firstCodeValue.value,
      'last_code=' + lastCodeValue.value
    ].join('&'); // .join('&')でandのクエリーをしている
    
    let response = await axios.get(url);
    let addressValue = response.data.prefecture + response.data.city + response.data.address;
    
    // もしNaNでなければ
    if (addressValue) {
            // formに住所を反映
      document.getElementById("address").value = addressValue;
    }

  };

  // jsxのhtml部分
  return (
    <>
      <div className="form-group m-0">
        <label htmlFor="first_code" className="control-label">郵便番号</label>
          <input
          name="first_code"
          size="3"
          maxLength="3"
            // 以下でvalueに変化が会った時にイベントが発生する
            // setPostalCodeの引数にpostalCodeのfirstCode: e.target.valueをしていしてjsonに値を入れている
          onKeyUp={(e) => { setFirstCodeCount({ count: e.target.value.length }) }}
          onChange={(e) => { setFirstCodeValue({ value: e.target.value }) }}
          />
        -
          <input
          name="last_code"
          size="4"
          maxLength="4"
            // 以下でvalueに変化が会った時にイベントが発生する
          onKeyUp={(e) => { setLastCodeCount({ count: e.target.value.length }) }}
          onChange={(e) => { setLastCodeValue({ value: e.target.value }) }}
          />
      </div>

      <div className="form-group m-0">
        <label htmlFor="address" className="control-label" >住所</label>
          <input
          name="address"
          id="address"
          className="form-control"
          cols="20"
          rows="1"
          />
      </div>
    </>
  )
}

export default PostalCode;