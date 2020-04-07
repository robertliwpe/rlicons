/**
 * BLOCK: Atomic Blocks Portfolio
 */

// Import block dependencies and components
import edit from './components/edit';

// Components
const { __ } = wp.i18n;

// Register block controls
const {
	registerBlockType
} = wp.blocks;

// Register alignments
const validAlignments = [ 'center', 'wide', 'full' ];

// Register the block
registerBlockType( 'atomic-blocks/ab-portfolio-grid', {
	title: __( 'AB Portfolio Block', 'atomic-blocks-pro' ),
	description: __( 'Customize and display your portfolio items.', 'atomic-blocks-pro' ),
	icon: 'format-gallery',
	category: 'atomic-blocks',
	keywords: [
		__( 'portfolio', 'atomic-blocks-pro' ),
		__( 'project', 'atomic-blocks-pro' ),
		__( 'gallery', 'atomic-blocks-pro' )
	],

	getEditWrapperProps( attributes ) {
		const { align } = attributes;
		if ( -1 !== validAlignments.indexOf( align ) ) {
			return { 'data-align': align };
		}
	},

	edit,

	ab_settings_data: {
		ab_portfolio_queryControls: {
			title: __( 'Query Controls', 'atomic-blocks-pro' )
		},
		ab_portfolio_offset: {
			title: __( 'Portfolio Offset', 'atomic-blocks-pro' )
		},
		ab_portfolio_columns: {
			title: __( 'Portfolio Columns', 'atomic-blocks-pro' )
		},
		ab_portfolio_displaySectionTitle: {
			title: __( 'Display Portfolio Section Title', 'atomic-blocks-pro' )
		},
		ab_portfolio_sectionTitle: {
			title: __( 'Portfolio Section Title', 'atomic-blocks-pro' )
		},
		ab_portfolio_displayPostImage: {
			title: __( 'Display Portfolio Featured Image', 'atomic-blocks-pro' )
		},
		ab_portfolio_imageSizeValue: {
			title: __( 'Portfolio Image Size', 'atomic-blocks-pro' )
		},
		ab_portfolio_displayPostTitle: {
			title: __( 'Display Portfolio Post Title', 'atomic-blocks-pro' )
		},
		ab_portfolio_displayPostExcerpt: {
			title: __( 'Display Portfolio Post Excerpt', 'atomic-blocks-pro' )
		},
		ab_portfolio_excerptLength: {
			title: __( 'Portfolio Excerpt Length', 'atomic-blocks-pro' )
		},
		ab_portfolio_displayPostLink: {
			title: __( 'Display Continue Reading Link', 'atomic-blocks-pro' )
		},
		ab_portfolio_readMoreText: {
			title: __( 'Read More Text', 'atomic-blocks-pro' )
		},
		ab_portfolio_sectionTag: {
			title: __( 'Portfolio Section Tag', 'atomic-blocks-pro' )
		},
		ab_portfolio_sectionTitleTag: {
			title: __( 'Portfolio Section Title Heading Tag', 'atomic-blocks-pro' )
		},
		ab_portfolio_postTitleTag: {
			title: __( 'Portfolio Item Title Heading Tag', 'atomic-blocks-pro' )
		}
	},
	// Render via PHP
	save() {
		return null;
	}
});
