/*
 * ドメインクラス例
 */
package jp.co.nextdesign.domain.products;

import java.util.ArrayList;
import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.ManyToMany;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 商品製造元
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class Supplier extends DdBaseEntity {
	private static final long serialVersionUID = 1L;
	
	/** 会社名 */
	private String name;
	
	/** 製造商品一覧 */
	@ManyToMany(mappedBy="suppliers", cascade={CascadeType.PERSIST, CascadeType.MERGE}, fetch=FetchType.EAGER)
	private List<Product> products;

	/** コンストラクタ */
	public Supplier(){
		super();
		this.products = new ArrayList<Product>();
	}

	/** DDB画面表示用タイトル */
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
	public List<Product> getProducts() {
		return products;
	}
	public void setProducts(List<Product> products) {
		this.products = products;
	}
	//ManyToManyの双方向関連を維持するために使用
	public void addProduct(Product product){
		if (product != null && !this.products.contains(product)){
			this.products.add(product);
			product.addSupplier(this);
		}
	}
	//ManyToManyの双方向関連を維持するために使用
	public void removeProduct(Product product){
		if (product != null && this.products.contains(product)){
			this.products.remove(product);
			product.removeSupplier(this);
		}
	}
}
