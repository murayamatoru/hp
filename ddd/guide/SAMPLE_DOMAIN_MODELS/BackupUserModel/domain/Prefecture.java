/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain;

import java.util.List;

import javax.persistence.Entity;
import javax.persistence.OneToMany;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;
import jp.co.nextdesign.service.MyClass;

/**
 * 県
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class Prefecture extends DdBaseEntity {
	
	private static final long serialVersionUID = 1L;

	/** 県名 */
	private String name;
	
	/** コンストラクタ */
	public Prefecture(){
		super();
	}
	
	/** DDB画面表示用タイトル */
	@Override
	public String getDDBEntityTitle(){
		return this.getName() != null ? this.getName() : "";
	}
	
	public String getName() {
		return name;
	}
	
	public void setName(String name) {
		this.name = name;
	}
}
