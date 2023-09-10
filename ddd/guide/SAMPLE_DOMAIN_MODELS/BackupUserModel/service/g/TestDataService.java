/*
 * DDBuilder1.0が生成したファイルです。  [生成日時 2016/09/05-10:48:13]
 */
package jp.co.nextdesign.service.g;

import java.util.Calendar;

import jp.co.nextdesign.domain.Address;
import jp.co.nextdesign.domain.Prefecture;
import jp.co.nextdesign.domain.customers.Customer;
import jp.co.nextdesign.domain.g.DdCustomerManager;
import jp.co.nextdesign.domain.g.DdPrefectureManager;
import jp.co.nextdesign.domain.g.DdProductManager;
import jp.co.nextdesign.domain.g.DdSafetyStockManager;
import jp.co.nextdesign.domain.g.DdStockManager;
import jp.co.nextdesign.domain.g.DdSupplierManager;
import jp.co.nextdesign.domain.g.DdWarehouseManager;
import jp.co.nextdesign.domain.products.Product;
import jp.co.nextdesign.domain.products.SafetyStock;
import jp.co.nextdesign.domain.products.Stock;
import jp.co.nextdesign.domain.products.Supplier;
import jp.co.nextdesign.domain.products.Warehouse;
import jp.co.nextdesign.service.ddb.DdBaseService;

/**
 * テスト用データを作成するサービス
 * このクラスはお客様コードを含むことになります。従ってDDBuilderは上書きしません。存在しない場合のみ新規作成します。
 * @author murayama
 *
 */
public class TestDataService extends DdBaseService{

	public void addTestData(int count){
		try {
			startService();
			begin();
			
			//必要な場合は、ここにテスト用データを作成するためのコードを書きます。
			//ホームページの「テストデータ追加」ボタンを押下するとこのメソッドが実行されます。

			//県
			DdPrefectureManager ｐrefectureManager = new DdPrefectureManager();
			for(String name : PREFECTURES){
				Prefecture ｐrefecture = new Prefecture();
				ｐrefecture.setName(name);
				ｐrefectureManager.persist(ｐrefecture);
			}
			
			//顧客
			Address address = new Address();
			address.setDetail("福岡市博多区");
			address.setPrefecture(ｐrefectureManager.getList().get(39));
			Customer customer = new Customer();
			customer.setAddress(address);
			customer.setFamilyName("博多");
			customer.setFirstName("太郎");
			customer.setRegistrationDate(Calendar.getInstance().getTime());
			DdCustomerManager customerManager = new DdCustomerManager();
			customerManager.persist(customer);
			
			//商品製造元1
			Supplier supplier1 = new Supplier();
			supplier1.setName("大阪製作所");
			DdSupplierManager supplierManager = new DdSupplierManager();
			supplierManager.persist(supplier1);
			//商品製造元2
			Supplier supplier2 = new Supplier();
			supplier2.setName("名古屋製造");
			supplierManager.persist(supplier2);
						
			//商品1
			Product product1 = new Product();
			product1.setProductName("テーブル");
			product1.addSupplier(supplier1);
			DdProductManager productManager = new DdProductManager();
			productManager.persist(product1);
			//商品2
			Product product2 = new Product();
			product2.setProductName("イス");
			product2.addSupplier(supplier1);
			product2.addSupplier(supplier2);
			productManager.persist(product2);

			//安全在庫1
			DdSafetyStockManager safetyStockManager = new DdSafetyStockManager();
			for(int month = 1; month<=12; month++){
				SafetyStock safetyStock = new SafetyStock();
				safetyStock.setMonth(month);
				safetyStock.setQuantity(10 + month);
				safetyStockManager.persist(safetyStock);
				product1.addSafetyStock(safetyStock);
			}
			//安全在庫2
			for(int month = 1; month<=12; month++){
				SafetyStock safetyStock = new SafetyStock();
				safetyStock.setMonth(month);
				safetyStock.setQuantity(20 + month);
				safetyStockManager.persist(safetyStock);
				product2.addSafetyStock(safetyStock);
			}

			//倉庫1
			Warehouse warehouse1 = new Warehouse();
			warehouse1.setName("北海道倉庫");
			DdWarehouseManager warehouseManager = new DdWarehouseManager();
			warehouseManager.persist(warehouse1);
			//倉庫2
			Warehouse warehouse2 = new Warehouse();
			warehouse2.setName("新潟倉庫");
			warehouseManager.persist(warehouse2);
			
			//在庫1 （商品1・倉庫1）
			Stock stock1 = new Stock();
			stock1.setProduct(product1);
			stock1.setWarehouse(warehouse1);
			stock1.setQuantity(20);
			DdStockManager stockManager = new DdStockManager();
			stockManager.persist(stock1);
			//在庫2 （商品1・倉庫2）
			Stock stock2 = new Stock();
			stock2.setProduct(product1);
			stock2.setWarehouse(warehouse2);
			stock2.setQuantity(30);
			stockManager.persist(stock2);
			//在庫3 （商品2・倉庫1）
			Stock stock3 = new Stock();
			stock3.setProduct(product1);
			stock3.setWarehouse(warehouse1);
			stock3.setQuantity(10);
			stockManager.persist(stock3);
			
			
			
			commit();
		} catch (Exception e) {
			rollback();
		} finally {
			endService();
		}
	}
	
	private static final String[] PREFECTURES = {
		"北海道",
		"青森県",
		"岩手県",
		"宮城県",
		"秋田県",
		"山形県",
		"福島県",
		"茨城県",
		"栃木県",
		"群馬県",
		"埼玉県",
		"千葉県",
		"東京都",
		"神奈川県",
		"新潟県",
		"富山県",
		"石川県",
		"福井県",
		"山梨県",
		"長野県",
		"岐阜県",
		"静岡県",
		"愛知県",
		"三重県",
		"滋賀県",
		"京都府",
		"大阪府",
		"兵庫県",
		"奈良県",
		"和歌山県",
		"鳥取県",
		"島根県",
		"岡山県",
		"広島県",
		"山口県",
		"徳島県",
		"香川県",
		"愛媛県",
		"高知県",
		"福岡県",
		"佐賀県",
		"長崎県",
		"熊本県",
		"大分県",
		"宮崎県",
		"鹿児島県",
		"沖縄県"
};
}
