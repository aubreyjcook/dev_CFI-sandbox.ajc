/**
 * Block dependencies
 */
import icon from "./icon";
import "./style.scss";
import "./editor.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const {
  RichText,
  InnerBlocks,
  useBlockProps,
  BlockControls,
  InspectorControls,
  ColorPalette,
} = wp.blockEditor;
const { AlignmentToolbar } = wp.editor;
const { CheckboxControl, PanelBody } = wp.components;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/collapse", {
  title: __("Collapse", "jsforwphowto"),
  description: __("Expandable text area.", "jsforwphowto"),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Accordion", "jsforwphowto")],
  attributes: {
    heading: {
      type: "array",
      source: "children",
      selector: "h5",
    },
    blockId: {
      type: "string",
    },
    checkboxControl: {
      type: "boolean",
      default: true,
    },
    collapseString: {
      type: "string",
    },
    colorPaletteControl: {
      type: "string",
      default: "#eeeeee",
    },
    colorPaletteControl2: {
      type: "string",
      default: "#333333",
    },
    textAlignment: {
      type: "string",
    },
    anchor: {
      type: "string",
    },
  },
  supports: {
    anchor: true,
  },
  edit: (props) => {
    const {
      attributes: {
        heading,
        blockId,
        checkboxControl,
        collapseString,
        colorPaletteControl,
        colorPaletteControl2,
        textAlignment,
        anchor,
      },
      className,
      setAttributes,
      clientId,
    } = props;
    const blockProps = useBlockProps();
    const onChangeHeading = (heading) => {
      setAttributes({ heading });
    };
    if (!blockId) {
      setAttributes({ blockId: clientId });
    }
    if (checkboxControl === true) {
      setAttributes({ collapseString: "collapse show" });
    } else {
      setAttributes({ collapseString: "collapse" });
    }
    return (
      <>
        <InspectorControls>
          <PanelBody>
            <CheckboxControl
              label={__("Display open", "jsforwpblocks")}
              help={__(
                "After customizing the content, choose whether or not the panel should be expanded when the page loads.",
                "jsforwpblocks"
              )}
              checked={checkboxControl}
              onChange={(checkboxControl) => setAttributes({ checkboxControl })}
            />
          </PanelBody>
          <PanelBody>
            <h3>{__("Heading Background Color", "jsforwpblocks")}</h3>
            <ColorPalette
              value={colorPaletteControl}
              onChange={(colorPaletteControl) => {
                setAttributes({ colorPaletteControl });
              }}
            />
            <h3>{__("Text Color", "jsforwpblocks")}</h3>
            <ColorPalette
              value={colorPaletteControl2}
              onChange={(colorPaletteControl2) => {
                setAttributes({ colorPaletteControl2 });
              }}
            />
          </PanelBody>
        </InspectorControls>
        <div id={anchor}>
          <div id={"a" + blockId} className={className}>
            <div className="card">
              <div
                id={"headinga" + blockId}
                className="card-header btn"
                data-toggle="collapse"
                data-target={"#collapsea" + blockId}
                aria-expanded={checkboxControl}
                aria-controls={"collapsea" + blockId}
                style={{
                  backgroundColor: colorPaletteControl,
                  color: colorPaletteControl2,
                }}
              >
                <BlockControls>
                  <AlignmentToolbar
                    value={textAlignment}
                    onChange={(textAlignment) =>
                      setAttributes({ textAlignment })
                    }
                  />
                </BlockControls>
                <RichText
                  className="mb-0"
                  tagName="h5"
                  placeholder={__("Add heading", "jsforwphowto")}
                  onChange={onChangeHeading}
                  style={{ textAlign: textAlignment }}
                  value={heading}
                />
              </div>
              <div
                id={"collapsea" + blockId}
                className={collapseString}
                aria-labelledby={"headinga" + blockId}
                data-parent={"#a" + blockId}
              >
                <div className="card-body">
                  <div {...blockProps}>
                    <InnerBlocks />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </>
    );
  },
  save: (props) => {
    const {
      attributes: {
        blockId,
        heading,
        className,
        checkboxControl,
        collapseString,
        colorPaletteControl,
        colorPaletteControl2,
        textAlignment,
        anchor,
      },
    } = props;
    const blockProps = useBlockProps.save();
    return (
      <div id={anchor}>
        <div id={"a" + blockId} class={className}>
          <div class="card">
            <div
              id={"headinga" + blockId}
              class="card-header btn"
              data-toggle="collapse"
              data-target={"#collapsea" + blockId}
              aria-expanded={checkboxControl}
              aria-controls={"collapsea" + blockId}
              style={{
                backgroundColor: colorPaletteControl,
                color: colorPaletteControl2,
              }}
            >
              <h5 class="mb-0" style={{ textAlign: textAlignment }}>
                {heading}
              </h5>
            </div>

            <div
              id={"collapsea" + blockId}
              class={collapseString}
              aria-labelledby={"headinga" + blockId}
              data-parent={"#a" + blockId}
            >
              <div class="card-body">
                <div {...blockProps}>
                  <InnerBlocks.Content />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  },
});
