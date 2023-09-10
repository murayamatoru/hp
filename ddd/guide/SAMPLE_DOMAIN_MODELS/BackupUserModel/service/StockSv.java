package jp.co.nextdesign.service;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;

import jp.co.nextdesign.domain.Prefecture;
import jp.co.nextdesign.domain.orders.OrderType;
import jp.co.nextdesign.domain.products.Product;
import jp.co.nextdesign.domain.products.Stock;
import jp.co.nextdesign.domain.products.Warehouse;
import jp.co.nextdesign.service.ddb.DdBaseService;

/**
 * 在庫管理
 * 引数型,戻り値型の例です。DDD的にリッチな例ではありません。
 * @author murayama
 *
 */
public class StockSv extends DdBaseService {
	
	/**
	 * 在庫サービス1
	 * @param orderMode
	 * @param pBoolean
	 * @param pDate 日付引数
	 * @param pPrefectures 県リスト
	 * @param customerName 顧客名
	 * @param warehouse 対象倉庫
	 * @param month 対象月数
	 * @return　文字列型結果
	 */
	public String svMethod01(
			OrderType orderMode,
			Boolean pBoolean,
			Date pDate,
			List<Prefecture> pPrefectures,
			String customerName, 
			Warehouse warehouse, 
			Integer month){
		return "文字列型戻り値";
	}

	/**
	 * 在庫サービス2
	 * @param orderMode
	 * @param pBoolean
	 * @param orderMode2
	 * @param pBoolean2
	 * @return 日付型結果
	 */
	public Date svMethod02(
			OrderType orderMode,
			Boolean pBoolean,
			OrderType orderMode2,
			Boolean pBoolean2
			){
		return Calendar.getInstance().getTime();
	}

	/**
	 * 在庫サービス3
	 * @param pDate
	 * @param pPrefectures
	 * @param pDate2
	 * @param pPrefectures2
	 * @return
	 */
	public Boolean svMethod03(
			Date pDate,
			List<Prefecture> pPrefectures,
			Date pDate2,
			List<Prefecture> pPrefectures2
			){
		return true;
	}
	
	/**
	 * 在庫サービス4
	 * @param customerName
	 * @param warehouse
	 * @param month
	 * @param customerName2
	 * @param warehouse2
	 * @param month2
	 * @return enum型結果
	 */
	public OrderType svMethod04(
			String customerName, 
			Warehouse warehouse, 
			Integer month,
			String customerName2, 
			Warehouse warehouse2, 
			Integer month2
			){
		return OrderType.NORMAL;
	}
	
	/**
	 * 在庫サービス5
	 * @param orderMode
	 * @return 在庫型結果
	 */
	public Stock svMethod05(
			OrderType orderMode
			){
		return new Stock();
	}
		
	/**
	 * 在庫サービス6
	 * @param orderMode
	 * @param pBoolean
	 * @return 商品リスト型結果
	 */	
	public List<Product> svMethod06(
			OrderType orderMode,
			Boolean pBoolean
			){
		List<Product> resultList = new ArrayList<Product>();
		for(int i=0; i<8; i++){
			Product product = new Product();
			product.setProductName("商品名" + i);
			resultList.add(product);
		}
		return resultList;
	}
	
	/**
	 * 在庫サービス7
	 * @param orderMode
	 * @param pBoolean
	 * @param pDate 日付引数
	 * @param month 対象月数
	 * @return プリミティブラッパー型結果
	 */
	public Float svMethod07(
			OrderType orderMode,
			Boolean pBoolean,
			Date pDate,
			Integer month
			){
		return 99.9F;
	}
}
