/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.ManyToOne;
import javax.persistence.OneToOne;

import jp.co.nextdesign.domain.customers.Customer;
import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 住所
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class Address extends DdBaseEntity {

	private static final long serialVersionUID = 1L;
		
	/** 県 */
	@ManyToOne
	private Prefecture prefecture;
	
	/** 詳細 */
	private String detail;
	
	/** コンストラクタ */
	public Address(){
		super();
	}
	
	/** 住所情報を応答する */
	public String getInfo(){
		String result = this.getPrefecture() != null ? this.getPrefecture().getName() : "県不明";
		result += " " + this.getDetail();
		return result;
	}

	/** DDB画面表示用タイトル */
	@Override
	public String getDDBEntityTitle(){
		return this.getInfo();
	}

	public Prefecture getPrefecture() {
		return prefecture;
	}

	public void setPrefecture(Prefecture prefecture) {
		this.prefecture = prefecture;
	}

	public String getDetail() {
		return detail;
	}

	public void setDetail(String detail) {
		this.detail = detail;
	}
}
