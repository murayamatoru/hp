/*
 * モデル例
 */
package jp.co.nextdesign.domain;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import javax.persistence.CascadeType;
import javax.persistence.Entity;
import javax.persistence.EnumType;
import javax.persistence.Enumerated;
import javax.persistence.FetchType;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import javax.persistence.Transient;

import jp.co.nextdesign.domain.ddb.DdBaseEntity;
import jp.co.nextdesign.domain.store.Store;

/**
 * 書籍
 * 属性型,関連アノテーションの例です。DDD的にリッチな例ではありません。
 * @author murayama
 *
 */
@Entity
public class Book extends DdBaseEntity {
	private static final long serialVersionUID = 1L;
	
	/** 書名 */
	private String name;

	/** 書名2 */
	private String name2;

	/** 出版日 */
	private Date publishedAt;
	
	/** 出版日2 */
	private Date publishedAt2;
	
	/** 仕入価格 */
	private BigDecimal cost;
	
	/** 仕入価格2 */
	private BigDecimal cost2;
	
	/** キャンペーン1 isなし */
	private Boolean campaign1;
	
	/** キャンペーン12 isなし */
	private Boolean campaign12;
	
	/** キャンペーン2 is付き */
	private Boolean isCampaign2;
	
	/** キャンペーン22 is付き */
	private Boolean isCampaign22;
	
	/** 言語 */
	@Enumerated(EnumType.STRING)
	private EnumLanguage attEnum;
	
	/** 言語2 */
	@Enumerated(EnumType.STRING)
	private EnumLanguage attEnum2;

	/** ISBN one-to-one owning/parent これはHibernate ORM 5.2 User Guide2.7とは少し異なる */
	@OneToOne(cascade=CascadeType.ALL)
	@JoinColumn(name="isbn_id") //自分の列
	private Isbn isbn;
	
	/** ISBN2 one-to-one owning/parent これはHibernate ORM 5.2 User Guide2.7とは少し異なる */
	@OneToOne(cascade=CascadeType.ALL)
	@JoinColumn(name="isbn_id2") //自分の列
	private Isbn isbn2;
	
	/** 著者 */
	@ManyToOne
	private Author author;

	/** 著者2 */
	@ManyToOne
	private Author author2;

	/** 版 */
	@OneToMany(mappedBy="book", cascade=CascadeType.ALL, orphanRemoval=true)
	private List<Edition> editionList;
	
	/** 版2 */
	@OneToMany(mappedBy="book2", cascade=CascadeType.ALL, orphanRemoval=true)
	private List<Edition> editionList2;
	
	/**
	 * 書店
	 * Book編集画面で関連付ける書店を選択／解除しても書店側には反映されない。
	 * setStoreList, getStoreListを参照。
	 * 同期反映させるにはaddStore/removeStoreを使うかまたは、ManyToManyを2つのOneToManyで定義する。
	 * Hibernate ORM 5.2 User Guide2.7.2 Bidirectional ManyToMany参照
	 */
	@ManyToMany(cascade={CascadeType.PERSIST, CascadeType.MERGE}, fetch=FetchType.EAGER)
	private List<Store> storeList;
	
	/** 書店2
	 * BookとStoreの間に2つのManyToManyを定義すると、次のようなBook_Storeテーブルが作成される。
	 * このテーブルにinsertするためには、4つのxxxx_idが全てnot nullに限られるので、insert時に（常に）例外が発生する。
	 * 同じエンティティ間で複数のMantToMany関連を定義したい場合は@JoinTableを使用する必要があると思われる。
	 * ここでは未確認。
	 * create table Book_Store (
	 *   bookList2_id bigint not null,
	 *   storeList2_id bigint not null,
	 *   bookList_id bigint not null,
	 *   storeList_id bigint not null
	 * )
	 */
//	@ManyToMany(cascade={CascadeType.PERSIST, CascadeType.MERGE})
//	private List<Store> storeList2;
	
	/** Integer型属性名 */
	private Integer integerAttribute;
	
	/** Integer型属性名2 */
	private Integer integerAttribute2;
	
	/** Byte型属性名 */
	private Byte attByte;
	
	/** Byte型属性名2 */
	private Byte attByte2;
	
	/** Short型属性名 */
	private Short attShort;
	
	/** Short型属性名2 */
	private Short attShort2;
	
	/** Long型属性名 */
	private Long attLong;
	
	/** Long型属性名2 */
	private Long attLong2;
	
	/** Float型属性名 */
	private Float attFloat;
	
	/** Float型属性名2 */
	private Float attFloat2;
	
	/** Double型属性名 */
	private Double attDouble;
	
	/** Double型属性名2 */
	private Double attDouble2;
	
	/** Character型属性名 */
	private Character attCharacter;
	
	/** Character型属性名2 */
	private Character attCharacter2;
	
	/** コンストラクタ */
	public Book(){
		super();
		this.name = "";
		this.storeList = new ArrayList<Store>();
//		this.storeList2 = new ArrayList<Store>();
		this.editionList = new ArrayList<Edition>();
		this.editionList2 = new ArrayList<Edition>();
	}
	
	//ManyToManyで双方向関連を維持するためのaddStore,removeStoreを含む。owning側ではなくmappedBy側から使用するが、両側に実装する。
	public List<Store> getStoreList() {
		return storeList;
	}
	public void setStoreList(List<Store> storeList) {
		this.storeList = storeList;
	}
	public void addStore(Store store){
		if (store != null && !this.storeList.contains(store)){
			this.storeList.add(store);
			store.addBook(this);
		}
	}
	public void removeStore(Store store){
		if (store != null && this.storeList.contains(store)){
			this.storeList.remove(store);
			store.removeBook(this);
		}
	}
	
	//OneToManyで双方向関連を維持するためのコードを含むgetEditionList(),setEditionList(List<Edition> editionList)の例
	@Transient
	private ArrayList<Edition> latestEditionList = new ArrayList<Edition>();
	public List<Edition> getEditionList() {
		return this.editionList;
	}
	public void setEditionList(List<Edition> editionList) {
		for(Edition newEdition : editionList){
			if (!latestEditionList.contains(newEdition)){
				newEdition.setBook(this);
			}
		}
		for(Edition oldEdition : latestEditionList){
			if (!editionList.contains(oldEdition)){
				oldEdition.setBook(null);
			}
		}
		this.editionList = editionList;
		latestEditionList = new ArrayList<Edition>(this.editionList);
	}
	
	/** DDBのviewが使用する */
	@Override
	public String getDDBEntityTitle(){
		String result = this.getName();
		result += this.getAuthor() != null ? this.getAuthor().getName() : "";
		return result;
	}
	
//	public List<Store> getStoreList2() {
//		return storeList2;
//	}
//	public void setStoreList2(List<Store> storeList2) {
//		this.storeList2 = storeList2;
//	}
	public Isbn getIsbn() {
		return isbn;
	}
	public void setIsbn(Isbn isbn) {
		this.isbn = isbn;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public Author getAuthor() {
		return author;
	}
	public void setAuthor(Author author) {
		this.author = author;
	}
	public Date getPublishedAt() {
		return publishedAt;
	}
	public void setPublishedAt(Date publishedAt) {
		this.publishedAt = publishedAt;
	}
	//Eclipseのgetter/setter自動生成では(booleanではなくBooleanの場合)is名前形式のgetterは生成されない。
	//Wicketはis名前形式のgetter以外にget名前形式でもよい。
	public Boolean getCampaign1() {
		return campaign1;
	}
	public void setCampaign1(Boolean campaign1) {
		this.campaign1 = campaign1;
	}
	public Boolean getIsCampaign2() {
		return isCampaign2;
	}
	public void setIsCampaign2(Boolean isCampaign2) {
		this.isCampaign2 = isCampaign2;
	}
	public Byte getAttByte() {
		return attByte;
	}
	public void setAttByte(Byte attByte) {
		this.attByte = attByte;
	}
	public Short getAttShort() {
		return attShort;
	}
	public void setAttShort(Short attShort) {
		this.attShort = attShort;
	}
	public Integer getIntegerAttribute() {
		return integerAttribute;
	}
	public void setIntegerAttribute(Integer integerAttribute) {
		this.integerAttribute = integerAttribute;
	}
	public Long getAttLong() {
		return attLong;
	}
	public void setAttLong(Long attLong) {
		this.attLong = attLong;
	}
	public Float getAttFloat() {
		return attFloat;
	}
	public void setAttFloat(Float attFloat) {
		this.attFloat = attFloat;
	}
	public Double getAttDouble() {
		return attDouble;
	}
	public void setAttDouble(Double attDouble) {
		this.attDouble = attDouble;
	}
	public Character getAttCharacter() {
		return attCharacter;
	}
	public void setAttCharacter(Character attCharacter) {
		this.attCharacter = attCharacter;
	}
	public EnumLanguage getAttEnum() {
		return attEnum;
	}
	public void setAttEnum(EnumLanguage attEnum) {
		this.attEnum = attEnum;
	}

	/** debug用 */
	public void debugPrint(){
		String info = "<" + this.getClass().getSimpleName() + ">";
		info += "\nname=" + this.getName();
		info += "\npublishedAt=" + this.getPublishedAt();
		if(this.author != null) info += "\n" + this.getAuthor().getDebugInfo();
		if(this.isbn != null) info += "\n" + this.getIsbn().getDebugInfo();
		for(Edition edition : this.getEditionList()){
			info += "\n" + edition.getDebugInfo();
		}
		for(Store bookStore : this.getStoreList()){
			info += "\n" + bookStore.getDebugInfo();
		}
		info += "\n</" + this.getClass().getSimpleName() + ">";
		System.out.println("--------------------------------------");
		System.out.println(info);
		System.out.println("--------------------------------------");
	}

	public String getName2() {
		return name2;
	}
	public void setName2(String name2) {
		this.name2 = name2;
	}
	public Date getPublishedAt2() {
		return publishedAt2;
	}
	public void setPublishedAt2(Date publishedAt2) {
		this.publishedAt2 = publishedAt2;
	}
	public Boolean getCampaign12() {
		return campaign12;
	}
	public void setCampaign12(Boolean campaign12) {
		this.campaign12 = campaign12;
	}
	public Boolean getIsCampaign22() {
		return isCampaign22;
	}
	public void setIsCampaign22(Boolean isCampaign22) {
		this.isCampaign22 = isCampaign22;
	}
	public EnumLanguage getAttEnum2() {
		return attEnum2;
	}
	public void setAttEnum2(EnumLanguage attEnum2) {
		this.attEnum2 = attEnum2;
	}
	public Isbn getIsbn2() {
		return isbn2;
	}
	public void setIsbn2(Isbn isbn2) {
		this.isbn2 = isbn2;
	}
	public Author getAuthor2() {
		return author2;
	}
	public void setAuthor2(Author author2) {
		this.author2 = author2;
	}
	public List<Edition> getEditionList2() {
		return editionList2;
	}
	public void setEditionList2(List<Edition> editionList2) {
		this.editionList2 = editionList2;
	}
//	public List<Store> getStoreList2() {
//		return storeList2;
//	}
//	public void setStoreList2(List<Store> storeList2) {
//		this.storeList2 = storeList2;
//	}
	public Integer getIntegerAttribute2() {
		return integerAttribute2;
	}
	public void setIntegerAttribute2(Integer integerAttribute2) {
		this.integerAttribute2 = integerAttribute2;
	}
	public Byte getAttByte2() {
		return attByte2;
	}
	public void setAttByte2(Byte attByte2) {
		this.attByte2 = attByte2;
	}
	public Short getAttShort2() {
		return attShort2;
	}
	public void setAttShort2(Short attShort2) {
		this.attShort2 = attShort2;
	}
	public Long getAttLong2() {
		return attLong2;
	}
	public void setAttLong2(Long attLong2) {
		this.attLong2 = attLong2;
	}
	public Float getAttFloat2() {
		return attFloat2;
	}
	public void setAttFloat2(Float attFloat2) {
		this.attFloat2 = attFloat2;
	}
	public Double getAttDouble2() {
		return attDouble2;
	}
	public void setAttDouble2(Double attDouble2) {
		this.attDouble2 = attDouble2;
	}
	public Character getAttCharacter2() {
		return attCharacter2;
	}
	public void setAttCharacter2(Character attCharacter2) {
		this.attCharacter2 = attCharacter2;
	}
	public BigDecimal getCost() {
		return cost;
	}
	public void setCost(BigDecimal cost) {
		this.cost = cost;
	}
	public BigDecimal getCost2() {
		return cost2;
	}
	public void setCost2(BigDecimal cost2) {
		this.cost2 = cost2;
	}
	
//setStoreList,getStoreList,setEditionList,getEditionListに対策コードを追加したので以下は使用しない。
//	/*
//	 * getter/setterに加えて、このメソッドを追加する理由
//	 * OneToManyの関連に関連先を追加するためには、
//	 * book.getEditionList().add(newEdition)として、persist(book)としても追加されない。
//	 * newEdition.setBook(book)としてから、persist(book)しなければならない。
//	 * ただ、シーケンスとしてbook側を変更するだけにしたい場合もあるので、以下のようなaddEdition(newEdition)を実装した。
//	 * ただし、双方向維持のための常套コードのようにedition.setBook(book)からbook.addEdition(edition)とすると、
//	 * 復元時に"復元中にコレクションが変更された"という例外が発生するので、edition.setBook(book)からbook.addEdition(edition)は使用しないようにした。
//	 */
//	public void addEdition(Edition edition){
////		if(edition!=null && !this.editionList.contains(edition)){
////			edition.setBook(this);
////			this.editionList.add(edition);
////		}
//		//Hibernate ORM 5.2 User Guide2.7.2 Bidirectional @OneToMany 例を参考
//		this.editionList.add(edition);
//		edition.setBook(this);
//	}
//
//	/**
//	 * Hibernate ORM 5.2 User Guide2.7.2 Bidirectionaln@OneToMany 例を参考
//	 * @param edition
//	 */
//	public void removeEdition(Edition edition){
//		this.editionList.remove(edition);
//		edition.setBook(null);
//	}
//
//	/**
//	 * ManyToManyのowning sideなので自分のリストのみ更新する。
//	 * Store（mappedBy側）との間でaddBookから折り返すと復元時に"復元中にコレクションが変更された"例外が発生すると思われる
//	 */
//	public void addStore(Store store){
//		//Hibernate ORM 5.2 User Guide2.7.2 Bidirectionaln@ManyToManyではStore（mappedBy側）にHelperメソッドは無い。
////		if (store != null && !this.storeList.contains(store)){
////			this.storeList.add(store);
////		}
//		this.storeList.add(store);
//		store.getBookList().add(this);
//	}
//	
//	/**
//	 * 双方向関連を整合させるためのアプリケーションコード
//	 */
//	public void removeStore(Store store){
//		this.storeList.remove(store);
//		store.getBookList().remove(this);
//	}
}
