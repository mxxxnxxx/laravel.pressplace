import { useForm } from "react-hook-form";
import axios from "axios";
import imageCompression from "browser-image-compression";
import PhotosUpload from "./ImageUp";
import PostalCode from "./PostalCode";
import NewModal from "./NewModal";
import React, { useState } from 'react';
import { makeStyles, createStyles } from "@material-ui/core/styles"


// 型定義
interface Inputs {
  name: string;
  comment: string;
  address: string;
  tags: string;
};

const PlaceForm: React.FC = () => {
  // registerでバリデーション
  // errorsでバリデーションエラーのハンドリング
  // handleSubmitで送信
  const { register, errors, handleSubmit } = useForm<Inputs>({
    // 初回バリデーションのタイミング(mode)をonBlurに設定
    mode: "onBlur",
  });

  // 投稿画像のstateを設定
  const [photos, setPhotos] = useState<File[]>([]);
  const [address, setAddress] = useState("");
  const [show, setShow] = useState(false);

  // const modalOn = () => setShow(true);

  const onSubmit = async (data: Inputs): Promise<void> => {
    console.log(data);
    const { name, comment, tags} = data;
    if (
      name === "" &&
      comment === "" &&
      tags === "" &&
      photos.length === 0
    ) {
      // アンケートフォームが空の場合はPOSTしない
      return;
    }

    // 画像を送信できるようにFormDataに変換する
    const formData = new FormData();
    // appendでformDataにキーと値を追加
    formData.append("name", name);
    formData.append("comment", comment);
    formData.append("address", address);
    formData.append("tags", tags);
    const compressOptions = {
      // 3MB以下に圧縮する
      maxSizeMB: 3,
    };
    // Promise.all で 非同期処理を実行し値を代入
    const compressedPhotoData = await Promise.all(
      // 一枚一枚の順番を変えないため改めてasyncで処理をハンドリング
      photos.map(async (photo) => {
        return {
          blob: await imageCompression(photo, compressOptions)
        };
      })
    );
    // console.log(compressedPhotoData);
    
    for (let i = 0; i < compressedPhotoData.length; i++){
      formData.append("place_image_" + i, compressedPhotoData[i].blob,
      );

     }


    // 以下 一枚の写真しか送れなかったもの
    // forEachで圧縮した写真データphotoDataとして渡し一つずつformDataに入れる
    // compressedPhotoData.forEach((photoData) => {
    //   formData.append("place_image", photoData.blob, photoData.name);
    // });
    console.log(...formData.entries());
// axiosの記述方法 postメソッドを使わないやり方で記述
    axios({
      // php側のstoreメソッドのルートのurl
      url: "/place",
      method: "post",
      data: formData,
      // formの送信時のenctype
      headers: {
        "content-type": "multipart/form-data",
      },
    })
      .then(() => {
        // ここにモーダルコンポーネント
        return setShow(true);
        
      })
      .catch(() => {
        alert("エラーが発生しました。");
        
      });
  };
// スタイル
    const useStyles = makeStyles(() =>
    createStyles({
        "dataContainer": {
        borderColor: 'red'
        },
        "photoUpload": {
      },
      "AddressUpload": {},
      "tagsUpload": {},
        "button": {
        }

        
    }))
  const classes = useStyles();
  // html
  return (
    <>
      <form onSubmit={handleSubmit(onSubmit)}>
        
      <div className={classes.dataContainer}>
        <label>場所の名前</label>
        <input
          name="name"
          // refのなかにバリデーションルールを記述
          ref={register({required : true, maxLength: 30 })}
          // error={errors.name !== undefined}
          />
          {errors.address && <span>文字数は最大30文字です</span>}  
        <label>コメント</label>
        <input
            name="comment"
            ref={register({ required: true, maxLength: 200 })}
          />
          {errors.comment && <span>文字数は最大200文字です</span>}
      </div>
      
      <div className={classes.AddressUpload}>
        {/* PostalCodeで値を紐付ける必要がある  */}
        <PostalCode name="address" address={address} setAddress={setAddress} />
        
      </div>
      
      <div className={classes.photoUpload}>
        {/* propsでphotosのstateをわたす */}
            <PhotosUpload name="photos" photos={photos} setPhotos={setPhotos} />
          
      </div>
      <div className={classes.tagsUpload}>
        <label>タグ</label>
        <input
          name="tags"
          ref={register()}
        />
      </div>
      <div>
        <input type="submit" />
      </div>
      
      <div className={classes.button}>
              
        {/* <button disabled={ } /> */}
          
      </div>
      </form>
      <NewModal show={show} setShow={setShow} />

    </>
  );
};
export default PlaceForm;