/**
 * Inspector Controls
 */

// Setup the block
const { __ } = wp.i18n;
const { Component } = wp.element;

import compact from 'lodash/compact';
import map from 'lodash/map';
import RenderSettingControl from '../../../../lib/atomic-blocks/src/utils/components/settings/renderSettingControl';

// Import block components
const {
	InspectorControls
} = wp.blockEditor;

// Import Inspector components
const {
	PanelBody,
	QueryControls,
	RangeControl,
	SelectControl,
	TextControl,
	ToggleControl
} = wp.components;

const { addQueryArgs } = wp.url;

const { apiFetch } = wp;

const MAX_POSTS_COLUMNS = 4;

/**
 * Create an Inspector Controls wrapper Component
 */
export default class Inspector extends Component {

	constructor() {
		super( ...arguments );
		this.state = { categoriesList: [] };
	}

	componentDidMount() {
		this.stillMounted = true;
		this.fetchRequest = apiFetch({
			path: addQueryArgs( '/wp/v2/portfolio-type', { per_page: -1 })
		}).then(
			( categoriesList ) => {
				if ( this.stillMounted ) {
					this.setState({ categoriesList });
				}
			}
		).catch(
			() => {
				if ( this.stillMounted ) {
					this.setState({ categoriesList: [] });
				}
			}
		);
	}

	componentWillUnmount() {
		this.stillMounted = false;
	}

	/* Get the available image sizes */
	imageSizeSelect() {
		const getSettings = wp.data.select( 'core/editor' ).getEditorSettings();

		return compact( map( getSettings.imageSizes, ({ name, slug }) => {
			return {
				value: slug,
				label: name
			};
		}) );
	}

	render() {

		// Setup the attributes
		const {
			attributes,
			setAttributes,
			latestPosts
		} = this.props;

		const {
			order,
			orderBy
		} = attributes;

		const { categoriesList } = this.state;

		// Section title tags
		const sectionTags = [
			{ value: 'div', label: __( 'div', 'atomic-blocks-pro' ) },
			{ value: 'header', label: __( 'header', 'atomic-blocks-pro' ) },
			{ value: 'section', label: __( 'section', 'atomic-blocks-pro' ) },
			{ value: 'article', label: __( 'article', 'atomic-blocks-pro' ) },
			{ value: 'main', label: __( 'main', 'atomic-blocks-pro' ) },
			{ value: 'aside', label: __( 'aside', 'atomic-blocks-pro' ) },
			{ value: 'footer', label: __( 'footer', 'atomic-blocks-pro' ) }
		];

		// Section title tags
		const sectionTitleTags = [
			{ value: 'h2', label: __( 'H2', 'atomic-blocks-pro' ) },
			{ value: 'h3', label: __( 'H3', 'atomic-blocks-pro' ) },
			{ value: 'h4', label: __( 'H4', 'atomic-blocks-pro' ) },
			{ value: 'h5', label: __( 'H5', 'atomic-blocks-pro' ) },
			{ value: 'h6', label: __( 'H6', 'atomic-blocks-pro' ) }
		];

		// Check for posts
		const hasPosts = Array.isArray( latestPosts ) && latestPosts.length;

		// Add instruction text to the select
		const abImageSizeSelect = {
			value: 'selectimage',
			label: __( 'Select image size', 'atomic-blocks-pro' )
		};

		// Add the landscape image size to the select
		const abImageSizeLandscape = {
			value: 'ab-block-post-grid-landscape',
			label: __( 'AB Grid Landscape', 'atomic-blocks-pro' )
		};

		// Add the square image size to the select
		const abImageSizeSquare = {
			value: 'ab-block-post-grid-square',
			label: __( 'AB Grid Square', 'atomic-blocks-pro' )
		};

		// Get the image size options
		const imageSizeOptions = this.imageSizeSelect();

		// Combine the objects
		imageSizeOptions.push( abImageSizeSquare, abImageSizeLandscape );
		imageSizeOptions.unshift( abImageSizeSelect );

		const imageSizeValue = () => {
			for ( let i = 0; i < imageSizeOptions.length; i++ ) {
				if ( imageSizeOptions[i].value === attributes.imageSize ) {
					return attributes.imageSize;
				}
			}
			return 'full';
		};

		return (
			<InspectorControls>
				<PanelBody
					title={ __( 'Portfolio Settings', 'atomic-blocks-pro' ) }
				>
					<RenderSettingControl id="ab_portfolio_queryControls">
						<QueryControls
							{ ...{ order, orderBy } }
							numberOfItems={ attributes.postsToShow }
							categoriesList={ categoriesList }
							selectedCategoryId={ attributes.categories }
							onOrderChange={ ( value ) => setAttributes({ order: value }) }
							onOrderByChange={ ( value ) => setAttributes({ orderBy: value }) }
							onCategoryChange={ ( value ) => setAttributes({ categories: '' !== value ? value : undefined }) }
							onNumberOfItemsChange={ ( value ) => setAttributes({ postsToShow: value }) }
						/>
					</RenderSettingControl>
					<RenderSettingControl id="ab_portfolio_offset">
						<RangeControl
							label={ __( 'Number of items to offset', 'atomic-blocks-pro' ) }
							value={ attributes.offset }
							onChange={ ( value ) => setAttributes({ offset: value }) }
							min={ 0 }
							max={ 20 }
						/>
					</RenderSettingControl>
					{ 'grid' === attributes.postLayout &&
						<RenderSettingControl id="ab_portfolio_columns">
							<RangeControl
								label={ __( 'Columns', 'atomic-blocks-pro' ) }
								value={ attributes.columns }
								onChange={ ( value ) => setAttributes({ columns: value }) }
								min={ 1 }
								max={ ! hasPosts ? MAX_POSTS_COLUMNS : Math.min( MAX_POSTS_COLUMNS, latestPosts.length ) }
							/>
						</RenderSettingControl>
					}
				</PanelBody>
				<PanelBody
					title={ __( 'Portfolio Content', 'atomic-blocks-pro' ) }
					initialOpen={ false }
				>
					<RenderSettingControl id="ab_portfolio_displaySectionTitle">
						<ToggleControl
							label={ __( 'Display Section Title', 'atomic-blocks-pro' ) }
							checked={ attributes.displaySectionTitle }
							onChange={ () => this.props.setAttributes({ displaySectionTitle: ! attributes.displaySectionTitle }) }
						/>
					</RenderSettingControl>
					{ attributes.displaySectionTitle &&
						<RenderSettingControl id="ab_portfolio_sectionTitle">
							<TextControl
								label={ __( 'Section Title', 'atomic-blocks-pro' ) }
								type="text"
								value={ attributes.sectionTitle }
								onChange={ ( value ) => this.props.setAttributes({ sectionTitle: value }) }
							/>
						</RenderSettingControl>
					}
					<RenderSettingControl id="ab_portfolio_displayPostImage">
						<ToggleControl
							label={ __( 'Display Featured Image', 'atomic-blocks-pro' ) }
							checked={ attributes.displayPostImage }
							onChange={ () => this.props.setAttributes({ displayPostImage: ! attributes.displayPostImage }) }
						/>
					</RenderSettingControl>
					{ attributes.displayPostImage &&
						<RenderSettingControl id="ab_portfolio_imageSizeValue">
							<SelectControl
								label={ __( 'Image Size', 'atomic-blocks-pro' ) }
								value={ imageSizeValue() }
								options={ imageSizeOptions }
								onChange={ ( value ) => this.props.setAttributes({ imageSize: value }) }
							/>
						</RenderSettingControl>
					}
					<RenderSettingControl id="ab_portfolio_displayPostTitle">
						<ToggleControl
							label={ __( 'Display Title', 'atomic-blocks-pro' ) }
							checked={ attributes.displayPostTitle }
							onChange={ () => this.props.setAttributes({ displayPostTitle: ! attributes.displayPostTitle }) }
						/>
					</RenderSettingControl>
					<RenderSettingControl id="ab_portfolio_displayPostExcerpt">
						<ToggleControl
							label={ __( 'Display Excerpt', 'atomic-blocks-pro' ) }
							checked={ attributes.displayPostExcerpt }
							onChange={ () => this.props.setAttributes({ displayPostExcerpt: ! attributes.displayPostExcerpt }) }
						/>
					</RenderSettingControl>
					{ attributes.displayPostExcerpt &&
						<RenderSettingControl id="ab_portfolio_excerptLength">
							<RangeControl
								label={ __( 'Excerpt Length', 'atomic-blocks-pro' ) }
								value={ attributes.excerptLength }
								onChange={ ( value ) => setAttributes({ excerptLength: value }) }
								min={ 0 }
								max={ 150 }
							/>
						</RenderSettingControl>
					}
					<RenderSettingControl id="ab_portfolio_displayPostLink">
						<ToggleControl
							label={ __( 'Display Continue Reading Link', 'atomic-blocks-pro' ) }
							checked={ attributes.displayPostLink }
							onChange={ () => this.props.setAttributes({ displayPostLink: ! attributes.displayPostLink }) }
						/>
					</RenderSettingControl>
					{ attributes.displayPostLink &&
						<RenderSettingControl id="ab_portfolio_readMoreText">
							<TextControl
								label={ __( 'Customize Continue Reading Text', 'atomic-blocks-pro' ) }
								type="text"
								value={ attributes.readMoreText }
								onChange={ ( value ) => this.props.setAttributes({ readMoreText: value }) }
							/>
						</RenderSettingControl>
					}
				</PanelBody>
				<PanelBody
					title={ __( 'Portfolio Markup', 'atomic-blocks-pro' ) }
					initialOpen={ false }
					className="ab-block-post-grid-markup-settings"
				>
					<RenderSettingControl id="ab_portfolio_sectionTag">
						<SelectControl
							label={ __( 'Post Grid Section Tag', 'atomic-blocks-pro' ) }
							options={ sectionTags }
							value={ attributes.sectionTag }
							onChange={ ( value ) => this.props.setAttributes({ sectionTag: value }) }
							help={ __( 'Change the post grid section tag to match your content hierarchy.', 'atomic-blocks-pro' ) }
						/>
					</RenderSettingControl>
					{ attributes.sectionTitle &&
						<RenderSettingControl id="ab_portfolio_sectionTitleTag">
							<SelectControl
								label={ __( 'Section Title Heading Tag', 'atomic-blocks-pro' ) }
								options={ sectionTitleTags }
								value={ attributes.sectionTitleTag }
								onChange={ ( value ) => this.props.setAttributes({ sectionTitleTag: value }) }
								help={ __( 'Change the post/page section title tag to match your content hierarchy.', 'atomic-blocks-pro' ) }
							/>
						</RenderSettingControl>
					}
					{ attributes.displayPostTitle &&
						<RenderSettingControl id="ab_portfolio_postTitleTag">
							<SelectControl
								label={ __( 'Post Title Heading Tag', 'atomic-blocks-pro' ) }
								options={ sectionTitleTags }
								value={ attributes.postTitleTag }
								onChange={ ( value ) => this.props.setAttributes({ postTitleTag: value }) }
								help={ __( 'Change the post/page title tag to match your content hierarchy.', 'atomic-blocks-pro' ) }
							/>
						</RenderSettingControl>
					}
				</PanelBody>
			</InspectorControls>
		);
	}
}
