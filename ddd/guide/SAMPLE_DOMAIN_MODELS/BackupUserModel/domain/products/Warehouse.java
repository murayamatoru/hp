/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain.products;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.OneToMany;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 倉庫
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class Warehouse extends DdBaseEntity {
	private static final long serialVersionUID = 1L;
	
	/** 倉庫名 */
	private String name;
	
	/** 在庫 */
	@OneToMany(mappedBy="warehouse", cascade=CascadeType.ALL, orphanRemoval=true)
	private List<Stock> stocks;

	/** コンストラクタ */
	public Warehouse(){
		super();
		this.stocks = new ArrayList<Stock>();
	}

	@Override
	public String getDDBEntityTitle(){
		return this.getName();
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public List<Stock> getStocks() {
		return stocks;
	}

	public void setStocks(List<Stock> stocks) {
		this.stocks = stocks;
	}
	
}