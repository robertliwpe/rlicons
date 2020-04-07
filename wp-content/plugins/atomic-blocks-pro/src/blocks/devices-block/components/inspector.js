/**
 * Inspector Controls
 */

/**
 * Internal dependencies
 */
import BackgroundImagePanel from '../../../../lib/atomic-blocks/src/utils/components/background-image/inspector';

/* Setup the block */
const { __ } = wp.i18n;
const { Component } = wp.element;

/* Import block components */
const { InspectorControls } = wp.editor;

/* Import Inspector components */
const {
	PanelBody,
	SelectControl,
	ToggleControl,
	RangeControl
} = wp.components;

/* Create an Inspector Controls wrapper Component */
export default class Inspector extends Component {

	render() {

		/* Setup the attributes */
		const { attributes } = this.props;

		const deviceOptions = [
			{ value: 'ab-device-phone', label: __( 'Phone', 'atomic-blocks-pro' ) },
			{ value: 'ab-device-tablet', label: __( 'Tablet', 'atomic-blocks-pro' ) }
		];

		const deviceOrientationOptions = [
			{ value: 'ab-device-vertical', label: __( 'Vertical', 'atomic-blocks-pro' ) },
			{ value: 'ab-device-horizontal', label: __( 'Horizontal', 'atomic-blocks-pro' ) }
		];

		const deviceColorOptions = [
			{ value: 'ab-device-black', label: __( 'Black', 'atomic-blocks-pro' ) },
			{ value: 'ab-device-white', label: __( 'White', 'atomic-blocks-pro' ) }
		];

		return (
			<InspectorControls key="inspector">
				<PanelBody>
					<SelectControl
						label={ __( 'Device Type', 'atomic-blocks-pro' ) }
						description={ __( 'Choose between a mobile or tablet mockup.', 'atomic-blocks-pro' ) }
						options={ deviceOptions }
						value={ attributes.deviceType }
						onChange={ ( value ) => this.props.setAttributes({ deviceType: value }) }
					/>

					<SelectControl
						label={ __( 'Device Color', 'atomic-blocks-pro' ) }
						description={ __( 'Choose between a black or white device.', 'atomic-blocks-pro' ) }
						options={ deviceColorOptions }
						value={ attributes.deviceColor }
						onChange={ ( value ) => this.props.setAttributes({ deviceColor: value }) }
					/>

					<SelectControl
						label={ __( 'Device Orientation', 'atomic-blocks-pro' ) }
						description={ __( 'Choose between vertical or horizontal orientation.', 'atomic-blocks-pro' ) }
						options={ deviceOrientationOptions }
						value={ attributes.deviceOrientation }
						onChange={ ( value ) => this.props.setAttributes({ deviceOrientation: value }) }
					/>

					<ToggleControl
						label={ __( 'Enable Drop Shadow', 'atomic-blocks-pro' ) }
						checked={ attributes.deviceShadow }
						onChange={ () => this.props.setAttributes({ deviceShadow: ! attributes.deviceShadow }) }
					/>

					<RangeControl
						label={ __( 'Device Max Width', 'atomic-blocks-pro' ) }
						value={ attributes.deviceMaxWidth }
						onChange={ ( value ) => this.props.setAttributes({ deviceMaxWidth: value }) }
						min={ 100 }
						max={ 2000 }
						step={ 1 }
					/>

					<RangeControl
						label={ __( 'Device Border Width', 'atomic-blocks-pro' ) }
						value={ attributes.deviceBorder }
						onChange={ ( value ) => this.props.setAttributes({ deviceBorder: value }) }
						min={ 0 }
						max={ 2 }
						step={ .01 }
					/>

					<RangeControl
						label={ __( 'Device Border Radius', 'atomic-blocks-pro' ) }
						value={ attributes.deviceBorderRadius }
						onChange={ ( value ) => this.props.setAttributes({ deviceBorderRadius: value }) }
						min={ 0 }
						max={ 75 }
						step={ 1 }
					/>
				</PanelBody>

				<BackgroundImagePanel { ...this.props }>
				</BackgroundImagePanel>
			</InspectorControls>
		);
	}
}