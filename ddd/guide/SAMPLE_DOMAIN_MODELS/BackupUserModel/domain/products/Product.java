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
import javax.persistence.OneToMany;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;

/**
 * 商品
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 */
@Entity
public class Product extends DdBaseEntity {

	private static final long serialVersionUID = 1L;

	/** 商品名 */
	private String productName;
	
	/** 商品製造元 */
	@ManyToMany(cascade={CascadeType.PERSIST, CascadeType.MERGE}, fetch=FetchType.EAGER)
	private List<Supplier> suppliers;
	
	/** 安全在庫 */
	//@OneToMany(mappedBy="product", cascade=CascadeType.ALL, orphanRemoval=true)
	@OneToMany(mappedBy="product", cascade=CascadeType.ALL)
	private List<SafetyStock> safetyStocks;

	/** 在庫 */
	//@OneToMany(mappedBy="product", cascade=CascadeType.ALL, orphanRemoval=true)
	@OneToMany(mappedBy="product", cascade=CascadeType.ALL)
	private List<Stock> stocks;

	/** コンストラクタ */
	public Product(){
		super();
		this.suppliers = new ArrayList<Supplier>();
		this.safetyStocks = new ArrayList<SafetyStock>();
		this.stocks = new ArrayList<Stock>();
	}

	/*
	 * Hibernate ORM 5.2 User Guide2.7.2 Bidirectionaln@OneToMany 例を参考
	 * @param book
	 */
	public void addSafetyStock(SafetyStock safetyStock){
		this.safetyStocks.add(safetyStock);
		safetyStock.setProduct(this);
	}
	
	/**
	 * Hibernate ORM 5.2 User Guide2.7.2 Bidirectionaln@OneToMany 例を参考
	 * @param book
	 */
	public void removeSafetyStock(SafetyStock safetyStock){
		this.safetyStocks.remove(safetyStock);
		safetyStock.setProduct(null);
	}
	
	//ManyToManyの双方向関連を維持するために使用
	public void addSupplier(Supplier supplier){
		if (supplier != null && !this.suppliers.contains(supplier)){
			this.suppliers.add(supplier);
			supplier.addProduct(this);
		}
	}
	//ManyToManyの双方向関連を維持するために使用
	public void removeSupplier(Supplier supplier){
		if (supplier != null && this.suppliers.contains(supplier)){
			this.suppliers.remove(supplier);
			supplier.removeProduct(this);
		}
	}
	
	/** DDB画面表示用タイトル */
	@Override
	public String getDDBEntityTitle(){
		return this.getProductName();
	}
	
	public String getProductName() {
		return productName;
	}

	public void setProductName(String productName) {
		this.productName = productName;
	}

	public List<Supplier> getSuppliers() {
		return suppliers;
	}

	public void setSuppliers(List<Supplier> suppliers) {
		this.suppliers = suppliers;
	}

	public List<SafetyStock> getSafetyStocks() {
		return safetyStocks;
	}

	public void setSafetyStocks(List<SafetyStock> safetyStocks) {
		this.safetyStocks = safetyStocks;
	}

	public List<Stock> getStocks() {
		return stocks;
	}

	public void setStocks(List<Stock> stocks) {
		this.stocks = stocks;
	}	
	
}
